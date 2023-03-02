<?php

namespace App\Http\Controllers;

use App\Models\AcknowledgementReceipt;
use App\Mail\SendPaymentToTenant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Collection;
use App\Models\Property;
use App\Models\User;
use Session;
use DB;
use App\Models\Bill;
use \PDF;
use Carbon\Carbon;
use App\Models\Contract;
use App\Models\Wallet;
use Google\Service\Pubsub\AcknowledgeRequest;

class TenantCollectionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, Tenant $tenant)
    {
       app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id,'opens',11);

        return view('tenants.collections.index',[
         'tenant' => Tenant::find($tenant->uuid),
         'collections' => app('App\Http\Controllers\TenantController')->show_tenant_collections($tenant->uuid),
        ]);
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



    public function store(Request $request, Property $property, Tenant $tenant, $batch_no)
    {     
         $attributes = request()->validate([
            'collection' => 'required|integer|min:1',
         ]);

         try {

            $collection = $request->collection;
            
            $unpaid_bills_id = Bill::where('reference_no', $tenant->bill_reference_no)
            ->where('status','unpaid')
            ->orderBy('bill_no')
            ->pluck('id');

            $unpaid_bills_bill = Bill::where('reference_no', $tenant->bill_reference_no)
            ->where('status','unpaid')
            ->orderBy('bill_no')
            ->pluck('bill');

            if($collection>=$unpaid_bills_bill[0])
            {
                for($i=0; $i<$unpaid_bills_id->count(); $i++)
                { 
                   do{
                        $bill = Bill::find($unpaid_bills_id[$i]);
                        $bill->status = 'paid';
                        $bill->save();
                
                        $ar_no = Property::find(Session::get('property'))->collections->max('ar_no');

                        $attributes['tenant_uuid']= $tenant->uuid;
                        $attributes['property_uuid'] = Session::get('property');
                        $attributes['user_id'] = auth()->user()->id;
                        $attributes['ar_no'] = $ar_no+1;
                        $attributes['bill_id'] = $unpaid_bills_id[$i];
                        $attributes['bill_reference_no']= $tenant->bill_reference_no;
                        $attributes['form']= $request->form;

                        Collection::create($attributes);

                        $collection -= $unpaid_bills_bill[$i];

                   }while($collection>=$unpaid_bills_bill[$i]);
                }

                return back()->with('success','Collections has been saved.');
            }

            return back()->with('error','The collection is less than the bill.');

         }
         catch(\Exception $e)
         {  
            return back()->with('error','Cannot perform the action. Please try again.');
         }
    }

     public function export(Property $property, Tenant $tenant, AcknowledgementReceipt $ar)
     {          
         $balance = app('App\Http\Controllers\TenantBillController')->get_tenant_balance($ar->tenant_uuid);

         $data = $this->get_collection_data(
            $ar->created_at, 
            $tenant->bill_reference_no, 
            $tenant->tenant,
            $ar->mode_of_payment,
            User::find($ar->user_id)->name,
            User::find($ar->user_id)->role->role,
            $ar->ar_no,
            $ar->amount,
            $ar->cheque_no,
            $ar->bank,
            $property,
            $ar->date_deposited,
            Collection::where('tenant_uuid',$ar->tenant_uuid)->where('batch_no', $ar->collection_batch_no)->orderBy('ar_no','asc')->get(),
            $balance
         );

        $pdf = $this->generate_pdf($property, $data);

        return $pdf->download($tenant->tenant.'-ar.pdf');
     }

     public function view(Property $property, Tenant $tenant, AcknowledgementReceipt $ar)
     {          
         $balance = app('App\Http\Controllers\TenantBillController')->get_tenant_balance($ar->tenant_uuid);

         $data = $this->get_collection_data(
            $ar->created_at, 
            $tenant->bill_reference_no, 
            $tenant->tenant,
            $ar->mode_of_payment,
            User::find($ar->user_id)->name,
            User::find($ar->user_id)->role->role,
            $ar->ar_no,
            $ar->amount,
            $ar->cheque_no,
            $ar->bank,
            $property,
            $ar->date_deposited,
            Collection::where('tenant_uuid',$ar->tenant_uuid)->where('batch_no', $ar->collection_batch_no)->orderBy('ar_no','asc')->get(),
            $balance
         );

        $pdf = $this->generate_pdf($property, $data);

        return $pdf->stream($tenant->tenant.'-ar.pdf');
     }

   public function attachment(Property $property, Tenant $tenant, AcknowledgementReceipt $ar)
   {
      $attachment = $ar->attachment;

      return Storage::download(($attachment), 'AR_'.$ar->ar_no.'_'.$ar->tenant->tenant.'.png');
   }

   public function proof_of_payment(Property $property, Tenant $tenant, AcknowledgementReceipt $ar)
   {
      $proof_of_payment = $ar->proof_of_payment;

      return Storage::download(($proof_of_payment), 'AR_'.$ar->ar_no.'_'.$ar->tenant->tenant.'.png');
   }

     public function generate_pdf(Property $property, $data)
     {

         $pdf = PDF::loadView('tenants.collections.export', $data);

         $pdf->output();
               
         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, $property->property, null, 55, array(0,0,0),2,2,-30);

         return $pdf;

     }

     public function get_collection_data($payment_made, $reference_no, $tenant, $mode_of_payment, $user, $role, $ar_no, $amount, $cheque_no, $bank, $property, $date_deposited, $collections, $balance)
     {
      return [
         'created_at' => $payment_made,
         'reference_no' => $reference_no,
         'tenant' => $tenant,
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

     public function update(Request $request, Property $property, Tenant $tenant, $batch_no)
     {
         $ar_no = app('App\Http\Controllers\AcknowledgementReceiptController')->get_latest_ar(Session::get('property'));

         $counter = $this->get_selected_bills_count($batch_no, $tenant->uuid);
      
         for($i=0; $i<$counter; $i++)
         {
            $collection = (double) $request->input("collection_amount_".$i);

            $form = $request->form;

            $bill_id = $request->input("bill_id_".$i);

            $total_amount_due = app('App\Http\Controllers\TenantBillController')->get_bill_balance($bill_id);

            $bill = Bill::find($bill_id);

            //ddd($bill->particular_id);

            //store the deposit to tenant's wallet
            // if($bill->particular_id === '3' || $bill->particular_id === '4'){
            //       app('App\Http\Controllers\WalletController')->store(
            //          $tenant->uuid,
            //          '',
            //          $collection,
            //          $bill->particular->particular
            //       );
            // } 
            
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

         $contract_status = Tenant::find($tenant->uuid)->bills->where('status', '!=','paid')->where('description','movein charges');

         if($contract_status->count()<=0)
         {
            Contract::where('tenant_uuid', $tenant->uuid)
            ->update([
               'status' => 'active'
            ]);
         }

         $this->send_payment_to_tenant($tenant, $ar_no, $request->form, $request->created_at, User::find(auth()->user()->id)->name, User::find(auth()->user()->id)->role->role, Collection::where('tenant_uuid',$tenant->uuid)->where('batch_no', $batch_no)->get());
   
         // return redirect('/property/'.Session::get('property').'/tenant/'.$tenant->uuid.'/collections')->with('success', 'Payment is successfully created.');

         return redirect('/property/'.Session::get('property').'/tenant/'.$tenant->uuid.'/ar/'.$ar_id.'/view')->with('success', 'Payment is successfully created.');
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

      // if($tenant->email)
      //  {
      //    return Mail::to($tenant->email)->send(new SendPaymentToTenant($data));
      //  }
     }

     public function destroy_collection_from_tenant_page($tenant_uuid){
         Collection::where('tenant_uuid', $tenant_uuid)->delete();

         AcknowledgementReceipt::where('tenant_uuid', $tenant_uuid)->delete();
     }

     public function destroy(Property $property, Tenant $tenant, $batch_no)
     {
         Collection::where('tenant_uuid', $tenant->uuid)
         ->when($batch_no, function ($query) use ($batch_no) {
         $query->where('batch_no', $batch_no);
         })
         ->where('is_posted', 0)
         ->delete();

         Bill::where('tenant_uuid', $tenant->uuid)
         ->when($batch_no, function ($query) use ($batch_no) {
            $query->where('batch_no', $batch_no);
         })
         ->update([
            'batch_no' => null
         ]);

         return redirect('/property/'.Session::get('property').'/tenant/'.$tenant->uuid.'/bills');
     }
}
