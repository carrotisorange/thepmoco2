<?php

namespace App\Http\Controllers;

use App\Models\AcknowledgementReceipt;
use App\Mail\SendPaymentToTenant;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Collection;
use App\Models\Property;
use App\Models\User;
use Session;
use DB;
use App\Models\Bill;
use App\Models\Contract;

class TenantCollectionController extends Controller
{
    public function index(Property $property, Tenant $tenant)
    {
       app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',11);

        return view('tenants.collections.index',[
         'tenant' => Tenant::find($tenant->uuid),
          'collections' => app('App\Http\Controllers\TenantCollectionController')->get_tenant_collections($property->uuid, $tenant->uuid),
        ]);
    }

      public function get_tenant_collections($property_uuid, $tenant_uuid){
        return Collection::
        select('*', DB::raw("SUM(collection) as collection"),DB::raw("count(collection) as count") )
        ->where('property_uuid', $property_uuid)
        ->where('tenant_uuid', $tenant_uuid)
        ->where('is_posted', 1)
        ->groupBy('ar_no')
        ->orderBy('ar_no', 'desc')
        ->get();
    }

    public function edit(Property $property, Tenant $tenant, $batch_no)
    {
      $collections = Bill::where('tenant_uuid', $tenant->uuid)
      ->where('batch_no', $batch_no)
      ->get();

      return view('tenants.collections.edit',[
         'collections' => $collections,
         'tenant' => $tenant,
         'batch_no' => $batch_no
      ]);
    }


     public function view(Property $property, Tenant $tenant, Collection $collection)
     {          
        
         $data = $this->get_collection_data(
            $tenant,
            $collection,
  
         );

         $folder_path = 'tenants.collections.export';

        $pdf = app('App\Http\Controllers\FileExportController')->generate_pdf($property, $data, $folder_path);

        return $pdf->stream($tenant->tenant.'-ar.pdf');
     }

     public function get_collection_data($tenant, $collection)
     {

         $unpaid_bills =  Bill::where('tenant_uuid', $tenant->uuid)->whereIn('status', ['unpaid', 'partially_paid'])->sum('bill');
         $paid_bills = Collection::where('tenant_uuid', $tenant->uuid)->where('is_posted', 1)->sum('collection');

         if($unpaid_bills<=0){
            $balance = 0;
         }else{
            $balance = $unpaid_bills - $paid_bills;
         }

         $aggregated_collection = Collection::where('property_uuid',
         $collection->property_uuid)->where('tenant_uuid', $tenant->uuid)->where('is_posted', 1)->where('ar_no',
         $collection->ar_no);

      return [
         'created_at' => $collection->updated_at,
         'reference_no' => $tenant->bill_reference_no,
         'tenant' => $tenant->tenant,
         'mode_of_payment' => $collection->form,
         'user' => $collection->user->name,
         'ar_no' => $collection->ar_no,
         'amount' => $aggregated_collection->sum('collection'),
         'cheque_no' => $collection->cheque_no,
         'bank' => $collection->bank,
         'property' => $tenant->property->property,
         'date_deposited' => $collection->updated_at,
         'collections' => $aggregated_collection->get(),
         'balance' => $balance
      ];
     }

     public function update(Request $request, Property $property, Tenant $tenant, $batch_no)
     {
         Property::find($property->uuid)->collections()->where('tenant_uuid', $tenant->uuid)->where('is_posted', 0)->where('batch_no', '!=', $batch_no)->forceDelete();

         $ar_no = app('App\Http\Controllers\AcknowledgementReceiptController')->get_latest_ar($property->uuid);

         $counter = $this->get_selected_bills_count($batch_no, $tenant->uuid);
      
         for($i=0; $i<$counter; $i++)
         {
            $collection = (double) $request->input("collection_amount_".$i);

            $form = $request->form;

            $bill_id = $request->input("bill_id_".$i);

            $total_amount_due = app('App\Http\Controllers\TenantBillController')->get_bill_balance($bill_id);

            $bill = Bill::find($bill_id);

            //store the collection
            app('App\Http\Controllers\CollectionController')->update($ar_no, $bill_id, $collection, $form);

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

         $ar_id = app('App\Http\Controllers\AcknowledgementReceiptController')
         ->store(
                  $tenant->uuid,
                  '',
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

         app('App\Http\Controllers\PointController')->store($property->uuid, auth()->user()->id, Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->count(), 6);

         $contract_status = Tenant::find($tenant->uuid)->bills->where('status', '!=','paid')->where('description','movein charges');

         if($contract_status->count()<=0)
         {
            Contract::where('tenant_uuid', $tenant->uuid)
            ->update([
               'status' => 'active'
            ]);
         }

         $this->send_payment_to_tenant($tenant, $ar_no, $request->form, $request->created_at, User::find(auth()->user()->id)->name, User::find(auth()->user()->id)->role->role, Collection::where('tenant_uuid',$tenant->uuid)->where('batch_no', $batch_no)->get());
   
         return redirect('/property/'.$property->uuid.'/tenant/'.$tenant->uuid.'/collections')->with('success',
         'Success!');

         }

      public function get_selected_bills_count($batch_no, $tenant_uuid)
      {
      return Collection::where('property_uuid', Session::get('property'))
      ->where('tenant_uuid',$tenant_uuid)
      ->where('batch_no', $batch_no)
      ->where('is_posted', false)
      ->max('id');
      }

     public function send_payment_to_tenant($tenant, $ar_no, $form, $payment_made, $user, $role, $collection)
     {
       $data = [
         'tenant' => $tenant->tenant,
         'ar_no' => $ar_no,
         'form' => $form,
         'payment_made' => $payment_made,
         'user' => $user,
         'role' => $role,
         'collections' => $collection,
         'balance' => app('App\Http\Controllers\TenantBillController')->get_tenant_balance($tenant->uuid)
       ];

      if($tenant->email)
       {
         return Mail::to($tenant->email)->send(new SendPaymentToTenant($data));
       }
     }
}
