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
            ''
         ]);

         try {

            $unpaid_bills_count = Bill::where('reference_no', $tenant->bill_reference_no)->where('status','unpaid')->pluck('id');

            $unpaid_bills_sum = Bill::where('reference_no', $tenant->bill_reference_no)->where('status','unpaid')->sum('bill');

            for($i=0; $i<$unpaid_bills_count->count(); $i++)
            {
                if($request->collection)
                {
                    
                }
            }

        $ar_no = Property::find(Session::get('property'))->collections->max('ar_no');

         DB::beginTransaction();


         $attributes['tenant_uuid']= $tenant->uuid;
         $attributes['property_uuid'] = Session::get('property');
         $attributes['user_id'] = auth()->user()->id;
         $attributes['ar_no'] = $ar_no+1;
         $attributes['bill_reference_no']= $tenant->bill_reference_no;
         $attributes['form']= $request->form;

         Collection::create($attributes);

         DB::commit();

         return back()->with('success','Collections has been added.');
         }
         catch(\Exception $e)
         {
         ddd($e);
         return back()->with('error','Cannot perform the action. Please try again.');
         }
    }
}
