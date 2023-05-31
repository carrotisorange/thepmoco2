<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Property;
use App\Models\Owner;
use Session;
use App\Models\Bill;
use App\Models\Collection;
use App\Models\AcknowledgementReceipt;
use App\Models\DeedOfSale;
use App\Models\User;
use \PDF;
use Illuminate\Support\Str;

class OwnerCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, owner $owner)
    {
        return view('owners.collections.index',[
         'owner' => Owner::find($owner->uuid),
         'collections' => app('App\Http\Controllers\OwnerController')->show_owner_collections($owner->uuid),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property, Owner $owner, $batch_no)
    {
        $collections = Bill::where('owner_uuid', $owner->uuid)
        ->where('batch_no', $batch_no)
        ->get();

        return view('owners.collections.edit',[
         'collections' => $collections,
         'owner' => $owner,
         'batch_no' => $batch_no,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function get_selected_bills_count($batch_no)
     {
        return Collection::where('property_uuid', Session::get('property'))
         ->where('batch_no', $batch_no)
         ->where('is_posted', false)
         ->max('id');
     }

    public function view(Property $property, Owner $owner, AcknowledgementReceipt $ar)
     {          
         $balance = app('App\Http\Controllers\OwnerBillController')->get_owner_balance($ar->owner_uuid);

         $data = $this->get_collection_data(
            $ar->created_at, 
            $owner->bill_reference_no, 
            $owner->owner,
            DeedOfSale::where('owner_uuid', $owner->uuid)->get(),
            $ar->mode_of_payment,
            User::find($ar->user_id)->name,
            User::find($ar->user_id)->role->role,
            $ar->ar_no,
            $ar->amount,
            $ar->cheque_no,
            $ar->bank,
            $property,
            $ar->date_deposited,
            Collection::where('owner_uuid',$ar->owner_uuid)->where('batch_no', $ar->collection_batch_no)->orderBy('ar_no','asc')->get(),
            $balance
         );

        $pdf = $this->generate_pdf($property, $data);

        return $pdf->stream($owner->owner.'-ar.pdf');
     }

     
    public function generate_pdf(Property $property, $data)
     {

         $pdf = PDF::loadView('owners.collections.export', $data);

         $pdf->output();
               
         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, Str::limit($property->property,15), null, 55, array(0,0,0),2,2,-30);

         return $pdf;

     }

    public function get_collection_data($payment_made, $reference_no, $owner, $units, $mode_of_payment, $user, $role, $ar_no, $amount, $cheque_no, $bank, $property, $date_deposited, $collections, $balance)
     {
      return [
         'created_at' => $payment_made,
         'reference_no' => $reference_no,
         'owner' => $owner,
         'units' => $units,
         'mode_of_payment' => $mode_of_payment,
         'user' => $user,
         'role' => $role,
         'ar_no' => $ar_no,
         'amount' => $amount,
         'cheque_no' => $cheque_no,
         'bank' => $bank,
         'property' => $property,
         'date_deposited' => $date_deposited,
         'collections' => $collections,
         'balance' => $balance
      ];
     }

     
   public function attachment(Property $property, Owner $owner, AcknowledgementReceipt $ar)
   {
      $attachment = $ar->attachment;

      return Storage::download(($attachment), 'AR_'.$ar->ar_no.'_'.$ar->owner->owner.'.png');
   }

   public function proof_of_payment(Property $property, Owner $owner, AcknowledgementReceipt $ar)
   {
      $proof_of_payment = $ar->proof_of_payment;

      return Storage::download(($proof_of_payment), 'AR_'.$ar->ar_no.'_'.$ar->owner->owner.'.png');
   }

    public function update(Request $request, Property $property, Owner $owner, $batch_no)
    {
         $ar_no = app('App\Http\Controllers\AcknowledgementReceiptController')->get_latest_ar(Session::get('property'));

         $counter = $this->get_selected_bills_count($batch_no);
      
         for($i=0; $i<=$counter; $i++)
         {
            $collection = (double) $request->input("collection_amount_".$i);

            $form = $request->form;

            $bill_id = $request->input("bill_id_".$i);

            $total_amount_due = app('App\Http\Controllers\OwnerBillController')->get_bill_balance($bill_id);

            app('App\Http\Controllers\CollectionController')->update($ar_no, $bill_id, $collection, $form,);

            if(($total_amount_due) <= $collection)
            {
                app('App\Http\Controllers\BillController')->update_bill_amount_due($bill_id, 'paid');

                app('App\Http\Controllers\BillController')->update_bill_initial_payment($bill_id , $collection);
            }
            else
            {
                app('App\Http\Controllers\BillController')->update_bill_amount_due($bill_id, 'partially_paid');

                app('App\Http\Controllers\BillController')->update_bill_initial_payment($bill_id, $collection);
            }
         }

         app('App\Http\Controllers\AcknowledgementReceiptController')
         ->store( 
                '',
                $owner->uuid,
                  Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->sum('collection'),
                  Session::get('property'),
                  auth()->user()->id,
                  $ar_no,
                  $request->form,
                  $batch_no,
                  $request->check_no,
                  $request->bank,
                  $request->date_deposited,
                  $request->created_at,
                  $request->attachment,
                  $request->proof_of_payment,
         );

         app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->count(), 6);
         
         return redirect('/property/'.Session::get('property').'/owner/'.$owner->uuid.'/collections')->with('success', 'Success!');

    }

    public function export(Property $property, Owner $owner, AcknowledgementReceipt $ar)
     {          
         $balance = app('App\Http\Controllers\OwnerBillController')->get_owner_balance($ar->owner_uuid);

         $data = $this->get_collection_data(
            $ar->created_at, 
            $owner->bill_reference_no, 
            $owner->owner,
            DeedOfSale::where('owner_uuid', $owner->uuid)->get(),
            $ar->mode_of_payment,
            User::find($ar->user_id)->name,
            User::find($ar->user_id)->role->role,
            $ar->ar_no,
            $ar->amount,
            $ar->cheque_no,
            $ar->bank,
            $property,
            $ar->date_deposited,
            Collection::where('owner_uuid',$ar->owner_uuid)->where('batch_no', $ar->collection_batch_no)->orderBy('ar_no','asc')->get(),
            $balance
         );

        $pdf = $this->generate_pdf($property, $data);

        return $pdf->stream($owner->owner.'-ar.pdf');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property, Owner $owner, $batch_no)
    {

        Collection::where('owner_uuid', $owner->uuid)
        ->when($batch_no, function ($query) use ($batch_no) {
        $query->where('batch_no', $batch_no);
        })
        ->where('is_posted', 0)
        ->delete();

        Bill::where('owner_uuid', $owner->uuid)
        ->when($batch_no, function ($query) use ($batch_no) {
        $query->where('batch_no', $batch_no);
        })
        ->update([
        'batch_no' => null
        ]);

        return redirect('/property/'.Session::get('property').'/owner/'.$owner->uuid.'/bills');
    }
}
