<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Mail\SendPaymentToTenant;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportCollection;
use Carbon\Carbon;
use App\Models\{Collection, Property, Bill, Tenant, PaymentRequest, Contract, AcknowledgementReceipt};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CollectionController extends Controller
{
    public function index(Property $property)
    {
        $featureId = 12; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }
        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        return view('features.collections.index',[
        'property' => $property,
        'collections'=> AcknowledgementReceipt::where('property_uuid', $property->uuid)->orderBy('id','desc')->get()
        ]);
    }

    public function get($status=null, $groupBy=null)
    {
        return Collection::getAll(Session::get('property_uuid'), $status,$groupBy);
    }

    public function getCollectionBar(){
        return Collection::select(DB::raw('DATE_FORMAT(created_at,"%M, %Y") as month_name, sum(collection) as
        total_collection'))
        ->where('collections.property_uuid', Session::get('property_uuid'))
        ->posted()

        ->groupBy(DB::raw('month(created_at)+"-"+year(created_at)'))
        ->get();

    }

    public function getLatestAr()
    {
        return Property::find(Session::get('property_uuid'))->collections()->posted()->withTrashed()->max('ar_no')+1;
    }

    public function getCollections($property_uuid){
        return Property::find($property_uuid)->collections();
    }

    public function tenant_collection_index(Property $property, Tenant $tenant){
          return view('features.tenants.collections.index',[
            'tenant' => $tenant,
            'collections' => app('App\Http\Controllers\Features\CollectionController')->get_tenant_collections($property->uuid,$tenant->uuid)
          ]);
    }

    public function paymentVerificationIndex($property_uuid, $status)
    {

        $paymentRequests = PaymentRequest::join('tenants', 'payment_requests.tenant_uuid', 'tenants.uuid')
        ->select('*', 'payment_requests.status as payment_status', 'payment_requests.created_at as date_uploaded','payment_requests.updated_at as date_approved')
        ->where('tenants.property_uuid', Session::get('property_uuid'))
        ->where('payment_requests.status', $status)
        ->orderBy('payment_requests.created_at', 'desc')
        ->get();

        // $paymentRequests = PaymentRequest::where('property_uuid', Session::get('property_uuid'))->get();

        return view('payment_requests.index',[
            'requests' => $paymentRequests
        ]);
    }


    public function edit_collections(Property $property, Tenant $tenant, $batch_no)
    {

      return view('features.tenants.collections.edit',[
         'tenant' => $tenant,
         'batch_no' => $batch_no
      ]);
    }

    public function get_tenant_collections($property_uuid, $tenant_uuid){
        return Collection::
        select('*', DB::raw("SUM(collection) as collection"),DB::raw("count(collection) as count") )
        ->where('tenant_uuid', $tenant_uuid)
        ->posted()
        ->groupBy('ar_no')
        ->orderBy('ar_no', 'desc')
        ->get();
    }

    public function show($property_uuid, Tenant $tenant, PaymentRequest $paymentRequest)
    {
        return view('payment_requests.show',[
            'paymentRequest' => $paymentRequest,
        ]);
    }


    public function showCollections(Property $property, $type, $uuid, $batch_no)
    {
       return view('features.collections.type.index',[
            'type' => $type,
            'uuid' => $uuid,
            'batch_no' => $batch_no
        ]);
    }

    public function updateCollections(Request $request, Property $property, $type, $uuid, $batch_no)
     {
        try{
            DB::beginTransaction();

            Collection::where('property_uuid', Session::get('property_uuid'))
            ->where($type.'_uuid', $uuid)
            ->where('is_posted', 0)
            ->where('batch_no', '!=', $batch_no)
            ->forceDelete();

             //generate collection acknowledgement receipt no
             $ar_no = app('App\Http\Controllers\Features\CollectionController')->getLatestAr();

             $counter = Collection::where('property_uuid', Session::get('property_uuid'))
             ->where($type.'_uuid', $uuid)
             ->where('batch_no', $batch_no)
             ->count();

            for($i=0; $i< $counter; $i++)
            {
                $collection= (double) $request->input("collection_amount_".$i);

                 $form = $request->form;

                 $created_at = $request->created_at;

                 $bill_id = $request->input("bill_id_".$i);

                 //store the collection
                 app('App\Http\Controllers\Features\CollectionController')->update($ar_no, $bill_id, $collection, $form, $created_at);

                 app('App\Http\Controllers\Features\BillController')->update_bill_amount_due($bill_id, 'paid');

            }


                $ar_id = app('App\Http\Controllers\Subfeatures\AcknowledgementReceiptController')->store(
                    $type,
                    $uuid,
                    $collection,
                    $ar_no,
                    $request->form,
                    $batch_no,
                    $request->check_no,
                    $request->bank,
                    $request->date_deposited,
                    $request->created_at,
                    // $attachment
                );

                //  if(!$proof_of_payment == null)
                //  {
                //     AcknowledgementReceipt::where('id', $ar_id)
                //     ->update([
                //         'attachment' => $proof_of_payment->store('attachments')
                //     ]);
                //  }

                 if(Session::has('payment_request_id')){
                    PaymentRequest::where('id', Session::get('payment_request_id'))->update(['status' => 'approved']);
                    $proof_of_payment = PaymentRequest::where('id',Session::get('payment_request_id'))->pluck('proof_of_payment')->first();
                 }else{
                    if($request->proof_of_payment != null){
                        $proof_of_payment = $request->proof_of_payment->store('proof_of_payments');
                    }else{
                        $proof_of_payment = null;
                    }
                }

                if(!$proof_of_payment == null)
                 {
                    AcknowledgementReceipt::where('id', $ar_id)
                    ->update([
                        'proof_of_payment' => $proof_of_payment
                    ]);
                }

                app('App\Http\Controllers\Utilities\PointController')->store(Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->count(), 6);

                if($type == 'tenant')
                {
                    $contract_status = Tenant::find($uuid)->bills->where('status', '!=','paid')->where('description','movein charges');
                    if($contract_status->count()<=0)
                    {
                        Contract::where('tenant_uuid', $uuid) ->update(['status' => 'active']);
                    }
                }

            DB::commit();
            Log::info('Inserted ar id: '. $ar_id);

        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return redirect(url()->previous())->with('error', $e);
        }
        return redirect('/property/'.$property->uuid.'/'.$type.'/'.$uuid)->with('success', 'Changes Saved!');
    }


    public function edit(Property $property, Collection $collection, $type, $uuid){

        if($type=='tenant'){
            $collections = Collection::where('property_uuid', $property->uuid)->where('tenant_uuid', $uuid)->where('ar_no', $collection->ar_no)->groupBy('ar_no')->get();
        }elseif($type == 'owner'){
            $collections = Collection::where('property_uuid', $property->uuid)->where('owner_uuid', $uuid)->where('ar_no', $collection->ar_no)->groupBy('ar_no')->get();
        }else{
            $collections = Collection::where('property_uuid', $property->uuid)->where('guest_uuid', $uuid)->where('ar_no', $collection->ar_no)->groupBy('ar_no')->get();
        }

        return view('features.collections.edit',compact('collection','collections','type'));
    }

    public function getPaymentRequests($property_uuid)
    {
        return PaymentRequest::join('tenants', 'payment_requests.tenant_uuid', 'tenants.uuid')
        ->select('*', 'payment_requests.status as payment_status', 'payment_requests.created_at as date_uploaded', 'payment_requests.updated_at as date_approved')
        ->where('tenants.property_uuid', $property_uuid)
        ->where('payment_requests.status', 'pending')
        ->orderBy('payment_requests.created_at', 'desc')->get();
    }

    public function export_dcr(Property $property, $start_date, $end_date, $format){

        $collections = Collection::
         select('*')
        ->where('property_uuid', $property->uuid)
        ->whereBetween('created_at', [$start_date, $end_date])
        ->posted()->orderBy('ar_no')
        ->distinct()
        ->get();

        $data = [
            'collections' => $collections,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];

        if($format === 'pdf'){

            $folder_path = 'properties.collections.export_dcr';

            $perspective = 'portrait';

            $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective);

            $fileName = str_replace(' ', '_', $property->property).'_DCR_'.str_replace(' ', '_', $start_date.'_'.$end_date).'.pdf';

            return $pdf->stream($fileName);

        }else{

            Session::put('export_dcr_start_date', $start_date);
            Session::put('export_dcr_end_date', $end_date);

            $fileName = str_replace(' ', '_', $property->property).'_DCR_'.str_replace(' ', '_',$start_date.'_'.$end_date).'.xlsx';

            ob_end_clean(); // this
            ob_start(); // and this

            return Excel::download(new ExportCollection(), $fileName);
        }

    }

    public function get_selected_bills_count($batch_no, $tenant_uuid, $property_uuid)
    {
         return Collection::where('property_uuid', $property_uuid)
         ->where('tenant_uuid',$tenant_uuid)
         ->where('batch_no', $batch_no)
         ->count();
    }


    public function get_property_collections($property_uuid, $daily, $monthly)
    {
        return Collection::where('property_uuid',$property_uuid)
         ->when($daily, function ($query) use ($daily) {
          $query->whereDate('updated_at', $daily);
        })
         ->when($monthly, function ($query) use ($monthly) {
          $query->whereMonth('updated_at', $monthly);
        })
        ->posted()
        ->get();
    }

    public function show_payment_request($property_uuid, Tenant $tenant, PaymentRequest $paymentRequest)
    {
        return view('payment_requests.show',[
            'paymentRequest' => $paymentRequest,
        ]);
    }

     public function update_collections(Request $request, Property $property, Tenant $tenant, $batch_no)
     {

         PaymentRequest::where('id', Session::get('payment_request_id'))->update([
            'status' => 'approved'
         ]);

         //delete previous unposted collections
         app('App\Http\Controllers\Features\CollectionController')->delete_unposted_collections($tenant->uuid, $batch_no);

         //generate collection acknowledgement receipt no
         $ar_no = app('App\Http\Controllers\Features\CollectionController')->getLatestAr();

         $counter = $this->get_selected_bills_count($batch_no, $tenant->uuid, Session::get('property_uuid'));

         for($i=0; $i< $counter; $i++)
         {
            $collection = (double) $request->input("collection_amount_".$i);

            $form = $request->form;

            $created_at = $request->created_at;

            $bill_id = $request->input("bill_id_".$i);

            $total_amount_due = app('App\Http\Controllers\Features\BillController')->get_bill_balance($bill_id);

            //store the collection
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

            if(Session::has('payment_request_id')){
                $proof_of_payment = PaymentRequest::where('id',Session::get('payment_request_id'))->pluck('proof_of_payment')->first();

            }else{
                if($request->proof_of_payment != null){
                  $proof_of_payment = $request->proof_of_payment->store('proof_of_payments');
                }else{
                  $proof_of_payment = null;
                }
            }

         $ar_id = $this->storeAr(
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
                  $proof_of_payment,
         );


         app('App\Http\Controllers\Utilities\PointController')->store(Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->count(), 6);

         $contract_status = Tenant::find($tenant->uuid)->bills->where('status', '!=','paid')->where('description','movein charges');

         if($contract_status->count()<=0)
         {
            Contract::where('tenant_uuid', $tenant->uuid)
            ->update([
               'status' => 'active'
            ]);

         }

         // $this->send_payment_to_tenant($tenant, $ar_no, $request->form, $request->created_at, User::find(auth()->user()->id)->name, User::find(auth()->user()->id)->role->role, Collection::where('tenant_uuid',$tenant->uuid)->where('batch_no', $batch_no)->get());

         return redirect('/property/'.$property->uuid.'/tenant/'.$tenant->uuid)->with('success', 'Changes Saved!');
         }

    public function storeAr($tenant_uuid,$owner_uuid,$collection, $property_uuid, $user_id, $ar_no,
             $mode_of_payment, $batch_no, $cheque_no, $bank, $date_deposited, $created_at, $attachment,
             $proof_of_payment)
             {

             $ar_id = AcknowledgementReceipt::insertGetId([
             'tenant_uuid' => $tenant_uuid,
             'owner_uuid' => $owner_uuid,
             'amount' => $collection,
             'property_uuid' => $property_uuid,
             'user_id' => $user_id,
             'ar_no' => $ar_no,
             'mode_of_payment' => $mode_of_payment,
             'collection_batch_no' => $batch_no,
             'cheque_no' => $cheque_no,
             'bank' => $bank,
             'date_deposited' => $date_deposited,
             'created_at' => $created_at,
             ]);

             if(!$attachment == null)
             {
             AcknowledgementReceipt::where('id', $ar_id)
             ->update([
             'attachment' => $attachment->store('attachments')
             ]);
             }

             if(!$proof_of_payment == null)
             {
             AcknowledgementReceipt::where('id', $ar_id)
             ->update([
             'proof_of_payment' => $proof_of_payment
             ]);
             }

             return $ar_id;

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
         'balance' => app('App\Http\Controllers\Features\BillController')->get_tenant_balance($tenant->uuid)
       ];

      if($tenant->email)
       {
         return Mail::to($tenant->email)->send(new SendPaymentToTenant($data));
       }
     }

    public function update($ar_no, $bill_id, $collection, $form, $created_at)
    {
        $bill = Bill::find($bill_id);

        try{
            DB::beginTransaction();

            if($bill->particular_id == 2 || $bill->particular_id == 3){
                Bill::where('id', $bill_id)
                ->update([
                    'bill' => $bill->bill
                ]);
            }

            $collection = Collection::where('bill_id', $bill_id)
            ->update([
                'ar_no' => $ar_no,
                'collection' => $collection,
                'form' => $form,
                'is_posted' => true,
                'created_at' => $created_at
            ]);

            DB::commit();
            Log::info('Updated collection id (posted): '. $collection);

        }catch(\Exception $e){
            DB::rollBack();
            Log::error($e);
            return back()->with('error',$e);
        }
    }

    public function export_ar(Property $property, Tenant $tenant, Collection $collection)
     {
         $data = $this->get_collection_data(
            $tenant,
            $collection,
         );

         $folder_path = 'export.ar';

        $perspective = 'portrait';

        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective);

        $pdf_name = str_replace(' ', '_', $property->property).'_AR_'.$collection->ar_no.'.pdf';

        return $pdf->stream($pdf_name);
     }

    public function get_collection_data($tenant, $collection)
     {
         $unpaid_bills = Bill::where('tenant_uuid', $tenant->uuid)->posted()->sum('bill');
         $paid_bills = Collection::where('tenant_uuid', $tenant->uuid)->posted()->sum('collection');

         if($unpaid_bills<=0){
            $balance = 0;
         }else{
            $balance = $unpaid_bills - $paid_bills;
         }

         $aggregated_collection = Collection::where('property_uuid',
         $collection->property_uuid)->where('tenant_uuid', $tenant->uuid)->posted()->where('ar_no',
         $collection->ar_no);

      return [
         'created_at' => $collection->updated_at,
         'reference_no' => $tenant->bill_reference_no,
         'tenant' => $tenant->tenant,
         'mode_of_payment' => $collection->form,
         'user' => $collection->user->name,
         'ar_no' => $collection->ar_no,
         'or_no' => $collection->or_no,
         'amount' => $aggregated_collection->sum('collection'),
         'cheque_no' => $collection->cheque_no,
         'bank' => $collection->bank,
         'property' => $tenant->property->property,
         'date_deposited' => $collection->updated_at,
         'collections' => $aggregated_collection->get(),
         'balance' => $balance
      ];
     }

    static function shortNumber($number = null)
    {
        if($number == 0) {
            $short = '0.00';
        } elseif($number <= 999) {
            $short = $number;
        } elseif($number < 1000000) {
            $short = round($number/1000, 2).'K';
        } elseif($number < 1000000000) {
            $short =  round($number/1000000, 2).'M';
        } elseif($number >= 1000000000) {
            $short = round($number/1000000000, 2).'B';
        }

        return $short;
    }

    static public function divNumber($numerator, $denominator)
    {
       return $denominator == 0 ? 0 : ($numerator / $denominator);
    }

    public function store($tenant_uuid,$owner_uuid, $guest_uuid, $unit_uuid, $property_uuid, $bill_id, $bill_reference_no, $form, $collection, $collection_batch_no, $collection_ar_no, $is_posted, $contractDuration){

        return Collection::insertGetId([
            'tenant_uuid' => $tenant_uuid,
            'owner_uuid' => $owner_uuid,
            'guest_uuid' => $guest_uuid,
            'unit_uuid' => $unit_uuid,
            'property_uuid' => $property_uuid,
            'user_id' => auth()->user()->id,
            'bill_id' => $bill_id,
            'bill_reference_no' => $bill_reference_no,
            'form' => $form,
            'collection' => $collection,
            'batch_no' => $collection_batch_no,
            'ar_no' => $collection_ar_no,
            'is_posted' => $is_posted,
            'created_at' => Carbon::now(),
            'description' => $contractDuration
        ]);
    }

    public function storeCollection($index, $type, $uuid, $collection_batch_no, $collection_ar_no, $getBillTo){
        try
         {
            $bill = Bill::find($index);

            $contract = Contract::where('uuid', $bill->contract_uuid);

            $diffOfContractInMonths = Carbon::parse($contract->pluck('end')->last())->diffInMonths(Carbon::parse($contract->pluck('start')->last()));

            $contractDuration = null;

            if($type == 'tenant'){
                if($diffOfContractInMonths>6){
                    $contractDuration = 'long_term';
                }else{
                    $contractDuration = 'short_term';
                }
            }else{
                $contractDuration = 'transient';
            }

            //get the attributes for collections
            $particular_id = $bill->particular_id;
            $tenant_uuid = null;
            $owner_uuid = null;
            $guest_uuid = null;

            if($type == 'tenant'){
                $tenant_uuid = $uuid;
            }elseif($type == 'owner'){
                $owner_uuid = $uuid;
            }else{
                $guest_uuid = $uuid;
            }

            $unit_uuid = $bill->unit_uuid;
            $property_uuid = $bill->property_uuid;

            $bill_id = $bill->id;
            $bill_reference_no = $getBillTo->bill_reference_no;
            $form = 'cash';
            $collection = $bill->bill;
            $is_posted = false;

            DB::beginTransaction();

            //call the method for storing new collection
            $collection_id =  app('App\Http\Controllers\Features\CollectionController')->store(
               $tenant_uuid,
               $owner_uuid,
               $guest_uuid,
               $unit_uuid,
               $property_uuid,
               $bill_id,
               $bill_reference_no,
               $form,
               $collection,
               $collection_batch_no,
               $collection_ar_no,
               $is_posted,
               $contractDuration
         );

            //update selected bill to the generated collection batch no
            Bill::where('id', $index)
            ->where($type.'_uuid', $getBillTo->uuid)
            ->update([
               'batch_no' => $collection_batch_no
            ]);

            //mark collection as deposit if it's either utility or rent deposit
            if($particular_id === 3 || $particular_id === 4)
            {
               Collection::where('id', $collection_id)
               ->update([
                  'is_deposit' => true
               ]);
            }

            DB::commit();
            Log::info('Inserted collection id (unposted): '. $collection_id);

         }
        catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return back()->with('error',$e);
        }
    }

    public function delete_unposted_collections($tenant_uuid, $batch_no){
        Collection::where('tenant_uuid', $tenant_uuid)
        ->where('is_posted', 0)
        ->where('batch_no', '!=', $batch_no)
        ->forceDelete();
    }
}
