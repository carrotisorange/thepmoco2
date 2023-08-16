<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Session;
use App\Models\Property;
use App\Models\Unit;
use App\Models\Tenant;
use App\Models\Contract;
use Carbon\Carbon;
use App\Models\Collection;

class BillController extends Controller
{
    public function store($property_uuid, $unit_uuid, $tenant_uuid, $owner_uuid, $particular_id, $start_date, $end_date, $total_amount_due, $batch_no, $posted){
        Bill::create(
        [
            'unit_uuid' => $unit_uuid,
            'particular_id' => $particular_id,
            'start' => $start_date,
            'end' => $end_date,
            'bill' => $total_amount_due,
            'batch_no' => $batch_no,
            'property_uuid' => $property_uuid,
            'bill_no'=> $this->get_latest_bill_no($property_uuid),
            'user_id' => auth()->user()->id,
            'due_date' => Carbon::parse($start_date)->addDays(7),
            'is_posted' => $posted,
            'tenant_uuid' => $tenant_uuid,
            'owner_uuid' => $owner_uuid
         ]
         );
    }
    
    public function drafts($property_uuid,$batch_no){
     
        return view('bills.drafts', [
            'property_uuid' => $property_uuid,
            'batch_no' => $batch_no
        ]);
    }   

    public function create_new(Property $property, Unit $unit, Tenant $tenant, Contract $contract){
        return view('bills.create-new',[
            'property' => $property,
          'unit' => Unit::find($unit->uuid),
          'tenant' => $tenant,
          'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($property->uuid),
            'units' => app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($tenant->uuid),
            'bills' => app('App\Http\Controllers\TenantBillController')->show_tenant_bills($tenant->uuid),
            'contract' => $contract
        ]);
    }

    public function get_property_bills($property_uuid, $month, $status)
    {
        $bills = '';  

        if($status == 'paid')
        { 
              $bills = Collection::where('property_uuid',$property_uuid)->posted()
               ->when($month, function ($query) use ($month) {
               $query->whereMonth('created_at', $month);
               })
               ->sum('collection');

        }else{
              $bills = Bill::where('property_uuid', $property_uuid)->posted()
            ->when($month, function ($query) use ($month) {
                $query->whereMonth('created_at', $month);
            })->sum('bill')-

              Collection::where('property_uuid',$property_uuid)->posted()
              ->when($month, function ($query) use ($month) {
                $query->whereMonth('created_at', $month);
              })
              ->sum('collection');

             
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
        return sprintf('%08d',Property::find($property_uuid)->bills->max('bill_no')+1);
    }

    public function generate_bill_reference_no($type, $bill_no)
    {
        return $type.Carbon::now()->timestamp.''.$bill_no;
    }

    public function generate_bill_batch_no($bill_no)
    {
        return Carbon::now()->timestamp.''.$bill_no;
    }

    public function create(Unit $unit, Tenant $tenant, Contract $contract)
    {
        // $this->authorize('is_account_receivable_create_allowed');

        $bills = Tenant::find($tenant->uuid)->bills;
       
        $particulars = app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property_uuid'));

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
        return Bill::where('unit_uuid', $unit_uuid)->posted()->where('bill','>', 0)->orderBy('created_at','desc')->get();
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

        $bill = Bill::where('id', $id);
        if($bill->delete()){
            return back()->with('success', 'Success!');
        }
            return back()->with('error', 'Cannot complete your action.');
    }
}
