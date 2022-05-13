<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Collection;
use App\Models\Property;
use Session;
use DB;
use App\Models\Bill;

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
        'collections' => Tenant::find($tenant->uuid)->collections
        ]);
    }

    public function store(Request $request,  Tenant $tenant)
    {
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
}
