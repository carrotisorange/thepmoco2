<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

use App\Models\{Property,Owner,Bill,Collection,DeedOfSale};

class OwnerCollectionController extends Controller
{
    public function index(Property $property, owner $owner)
    {

    }

    public function get_owner_collections($property_uuid, $owner_uuid){
        return Collection::
        select('*', DB::raw("SUM(collection) as collection"),DB::raw("count(collection) as count") )
        ->where('owner_uuid', $owner_uuid)
        ->posted()
        ->groupBy('ar_no')
        ->orderBy('ar_no', 'desc')
        ->get();
    }

    public function edit(Property $property, Owner $owner, $batch_no)
    {
        $collections = Bill::where('owner_uuid', $owner->uuid)
        ->where('batch_no', $batch_no)
        ->get();

        return view('features.owners.collections.edit',[
         'collections' => $collections,
         'owner' => $owner,
         'batch_no' => $batch_no,
      ]);
    }



    public function view(Property $property, Owner $owner, Collection $collection)
    {

    $data = $this->get_collection_data(
        $owner,
        $collection,
     );

    $folder_path = 'features.owners.collections.export';

    $perspective = 'portrait';

    $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective);

    $pdf_name = str_replace(' ', '_', $property->property).'_AR_'.$collection->ar_no.'.pdf';

        return $pdf->stream($pdf_name);
    }

     public function get_collection_data($owner, $collection)
     {
        $aggregated_collection = Collection::where('property_uuid', $collection->property_uuid)->where('owner_uuid', $owner->uuid)->posted()->where('ar_no', $collection->ar_no);
        $unpaid_bills = Bill::where('owner_uuid', $owner->uuid)->posted()->sum('bill');
        $paid_bills = Collection::where('owner_uuid', $owner->uuid)->posted()->sum('collection');

        if($unpaid_bills<=0){
            $balance = 0;
        }else{
            $balance = $unpaid_bills - $paid_bills;
        }
        return [
         'created_at' => $collection->updated_at,
         'reference_no' => $owner->bill_reference_no,
         'owner' => $owner->owner,
         'mode_of_payment' => $collection->form,
         'user' => $collection->user->name,
         'role' => $collection->user->role->role,
         'ar_no' => $collection->ar_no,
         'amount' => $aggregated_collection->sum('collection'),
         'cheque_no' => $collection->cheque_no,
         'bank' => $collection->bank,
         'property' => $owner->property->property,
         'date_deposited' => $collection->updated_at,
         'collections' => $aggregated_collection->get(),
         'balance' => $balance,
         'units' => DeedOfSale::where('owner_uuid', $owner->uuid)->where('status', 'active')->get()
      ];
     }

    public function update(Request $request, Property $property, Owner $owner, $batch_no)
    {
        Property::find($property->uuid)->collections()->where('owner_uuid', $owner->uuid)->where('is_posted', 0)->where('batch_no', '!=', $batch_no)->forceDelete();

         $ar_no = app('App\Http\Controllers\Features\CollectionController')->getLatestAr();

         $counter = $this->get_selected_bills_count($batch_no);

         for($i=0; $i< $counter; $i++)
         {
            $collection = (double) $request->input("collection_amount_".$i);

            $form = $request->form;

            $created_at = $request->created_at;

            $bill_id = $request->input("bill_id_".$i);

            $total_amount_due = app('App\Http\Controllers\OwnerBillController')->get_bill_balance($bill_id);

            app('App\Http\Controllers\Features\CollectionController')->update($ar_no, $bill_id, $collection, $form, $created_at);

            if(($total_amount_due) <= $collection)
            {
                app('App\Http\Controllers\Features\BillController')->update_bill_amount_due($bill_id, 'paid');

                app('App\Http\Controllers\Features\BillController')->update_bill_initial_payment($bill_id , $collection);
            }
            else
            {
                app('App\Http\Controllers\Features\BillController')->update_bill_amount_due($bill_id, 'partially_paid');

                app('App\Http\Controllers\Features\BillController')->update_bill_initial_payment($bill_id, $collection);
            }
         }

         app('App\Http\Controllers\Features\CollectionController')
         ->storeAr(
                 '',
                  $owner->uuid,
                  Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->sum('collection'),
                  $property->uuid,
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

         app('App\Http\Controllers\Utilities\PointController')->store(Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->count(), 6);

         return redirect('/property/'.$property->uuid.'/owner/'.$owner->uuid)->with('success','Changes Saved!');

    }

    public function get_selected_bills_count($batch_no)
     {
        return Collection::where('property_uuid', Session::get('property_uuid'))
         ->where('batch_no', $batch_no)
         ->where('is_posted', false)
         ->count();
     }
}
