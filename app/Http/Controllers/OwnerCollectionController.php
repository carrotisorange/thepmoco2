<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Owner;
use Session;
use App\Models\Bill;
use App\Models\Collection;
use App\Models\Tenant;

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
         'batch_no' => $batch_no
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

    public function update(Request $request, Property $property, Owner $owner, $batch_no)
    {
         $ar_no = app('App\Http\Controllers\AcknowledgementReceiptController')->get_latest_ar(Session::get('property'));

         $counter = $this->get_selected_bills_count($batch_no);
      
         for($i=0; $i<=$counter; $i++)
         {
            $collection = (int) $request->input("collection_amount_".$i);

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
         );

         app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->count(), 6);

         //$this->send_payment_to_owner($owner, $ar_no, $request->form, $request->created_at, User::find(auth()->user()->id)->name, User::find(auth()->user()->id)->role->role, Collection::where('tenant_uuid',$tenant->uuid)->where('batch_no', $batch_no)->get());
   
         return redirect('/property/'.Session::get('property').'/owner/'.$owner->uuid.'/collections')->with('success', 'Payment is successfully created.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
