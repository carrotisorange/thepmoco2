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
        $this->authorize('is_account_receivable_read_allowed');
                
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',10);

        return view('bills.index',[
            'active_contracts' => Contract::where('property_uuid', Session::get('property'))->where('status', 'active')->get(),
            'active_tenants' => Contract::where('property_uuid', Session::get('property'))->where('contracts.status','active')->distinct()->pluck('tenant_uuid'),
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->show($property->uuid),
            'batch_no' => $batch_no
        ]);
    }

    public function create_new(Property $property, Tenant $tenant, Unit $unit){
        return view('bills.create-new',[
          'unit' => Unit::find($unit->uuid),
          'tenant' => $tenant,
          'particulars' => app('App\Http\Controllers\PropertyParticularController')->show($property->uuid),
           'units' => app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($tenant->uuid),
            'bills' => app('App\Http\Controllers\TenantBillController')->show_tenant_bills($tenant->uuid),
        ]);
    }

    // public function get_property_bills($property_uuid, $month){

    //     return Property::find($property_uuid)->acknowledgementreceipts()
    //     //->whereYear('created_at', Carbon::now()->format('Y'))
    //      ->when($month, function ($query) use ($month) {
    //      $query->whereMonth('created_at', $month);
    //      })
    //     ->sum('amount');
    // }

    public function get_property_bills($property_uuid, $month, $status)
    {
        $bills = '';  

        if($status == 'paid')
        { 
              $bills = Property::find($property_uuid)->acknowledgementreceipts()
              ->when($month, function ($query) use ($month) {
              $query->whereMonth('created_at', $month);
              })
              ->sum('amount');

        }else{
              $bills = Property::find($property_uuid)->bills()
              ->whereIn('status', ['unpaid', 'partially_paid'])
              ->when($month, function ($query) use ($month) {
              $query->whereMonth('created_at', $month);
              })
              ->sum('bill') -

              Property::find($property_uuid)->bills()
              ->whereIn('status', ['unpaid', 'partially_paid'])
              ->when($month, function ($query) use ($month) {
              $query->whereMonth('created_at', $month);
              })
              ->sum('initial_payment');

             
        }

        return $bills;
    
    }

    
    public function get_unit_bills($unit_uuid, $month, $status)
    {
        if($status == 'paid')
        { 
            $bills = Unit::find($unit_uuid)->bills()
              ->whereIn('status', ['paid', 'partially_paid'])
              ->when($month, function ($query) use ($month) {
              $query->whereMonth('created_at', $month);
              })
              ->sum('initial_payment');

        
        }else{
              $bills = Unit::find($unit_uuid)->bills()
              ->whereIn('status', ['unpaid', 'partially_paid'])
              ->when($month, function ($query) use ($month) {
              $query->whereMonth('created_at', $month);
              })
              ->sum('bill') -

              Unit::find($unit_uuid)->bills()
              ->whereIn('status', ['unpaid', 'partially_paid'])
              ->when($month, function ($query) use ($month) {
              $query->whereMonth('created_at', $month);
              })
              ->sum('initial_payment');
        }

        return $bills;
    
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
        $this->authorize('is_account_receivable_create_allowed');

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
        $this->authorize('is_account_receivable_delete_allowed');

        $bill = Bill::where('id', $id);
        if($bill->delete()){
            return back()->with('success', 'Bill has been removed.');
        }
            return back()->with('error', 'Cannot complete your action.');
    }
}
