<?php

namespace App\Http\Controllers;

use App\Models\AcknowledgementReceipt;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Collection;
use App\Models\Property;
use App\Models\User;
use Session;
use DB;
use App\Models\Bill;
use \PDF;

class TenantCollectionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Tenant $tenant)
    {
        return view('tenants.collections.index',[
         'tenant' => Tenant::find($tenant->uuid),
         'collections' => Tenant::find($tenant->uuid)->acknowledgementreceipts
        ]);
    }

    public function store(Request $request,  Tenant $tenant)
    {
       return 'asd';
       
         $attributes = request()->validate([
            'collection' => 'required|integer|min:1',
         ]);

         try {

            DB::beginTransaction();

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

                DB::commit();

                return back()->with('success','Collections has been saved.');
            }

            return back()->with('error','The collection is less than the bill.');

         }
         catch(\Exception $e)
         {
             ddd($e);
            return back()->with('error','Cannot perform the action. Please try again.');
         }
    }

     public function export(Tenant $tenant, AcknowledgementReceipt $ar)
     {   

         $balance = Bill::where('tenant_uuid', $ar->tenant_uuid)->whereIn('status', ['unpaid', 'partially_paid']);
   
         $data = [
            'created_at' => $ar->created_at,
            'tenant' => Tenant::find($ar->tenant_uuid)->tenant,
            'mode_of_payment' => $ar->mode_of_payment,
            'user' => User::find($ar->user_id)->name,
            'role' => User::find($ar->user_id)->role->role,
            'ar_no' => $ar->ar_no,
            'amount' => $ar->amount,
            'cheque_no' => $ar->cheque_no,
            'bank' => $ar->bank,
            'date_deposited' => $ar->date_deposited,
            'collections' => Collection::where('tenant_uuid',$ar->tenant_uuid)->where('batch_no',
            $ar->collection_batch_no)->get(),
            'balance' => $balance
         ];

        $pdf = PDF::loadView('tenants.collections.export', $data);
        return $pdf->stream($tenant->tenant.'-ar.pdf');
     }
}

