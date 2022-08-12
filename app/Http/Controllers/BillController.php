<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Session;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Contract;
use Carbon\Carbon;

class BillController extends Controller
{
    public function index(Property $property, $batch_no=null)
    {
        $this->authorize('billing');
                
        //app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',10);

        $particulars = app('App\Http\Controllers\PropertyParticularController')->show($property->uuid);

        return view('bills.index',[
            'active_contracts' => Contract::where('property_uuid', Session::get('property'))->where('status', 'active')->get(),
            'active_tenants' => Contract::where('property_uuid', Session::get('property'))->where('contracts.status','active')->distinct()->pluck('tenant_uuid'),
            'particulars' => $particulars,
            'batch_no' => $batch_no
        ]);
    }

    public function get_latest_bill_no($property_uuid)
    {
        return Property::find($property_uuid)->bills->max('bill_no')+1;
    }

    public function generate_bill_reference_no($bill_no)
    {
        return Carbon::now()->timestamp.''.$bill_no;
    }

    public function generate_bill_batch_no($bill_no)
    {
        return Carbon::now()->timestamp.''.$bill_no;
    }

    public function create(Unit $unit, Tenant $tenant, Contract $contract)
    {
        $bills = Tenant::find($tenant->uuid)->bills;
       
        $particulars = app('App\Http\Controllers\PropertyParticularController')->show(Session::get('property'));

        return view('bills.create',[
            'unit' => $unit,
            'tenant' => $tenant,
            'contract' => $contract,
            'bills' => $bills,
            'particulars' => $particulars,
            'units' => Tenant::find($tenant->uuid)->contracts
        ]);
    }

    public function show_unit_bills($unit_uuid)
    {
        return Unit::findOrFail($unit_uuid)->bills()->orderBy('bill_no','desc')->paginate(5);
    }
    
    public function update_bill_amount_due($bill_id, $status)
    {
         Bill::where('id', $bill_id)
         ->update([
             'status' => $status,
         ]);
    }

    public function update_bill_initial_payment($bill_id,$amount)
    {
        Bill::where('id', $bill_id)->increment('initial_payment', $amount);
    }

    public function destroy($id)
    {    
        $this->authorize('manager');

        $bill = Bill::where('id', $id);
        if($bill->delete()){
            return back()->with('success', 'Bill has been removed.');
        }
            return back()->with('error', 'Cannot complete your action.');
    }
}
