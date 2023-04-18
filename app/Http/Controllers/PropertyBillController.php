<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Contract;
use Session;
use App\Models\Bill;
use App\Models\Particular;

class PropertyBillController extends Controller
{
    public function index(Property $property, $batch_no=null, $drafts=0){
                
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',10);

        $this->authorize('is_account_receivable_read_allowed');
        
        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.bills.index',[
            'active_contracts' => Contract::where('property_uuid', $property->uuid)->where('status', 'active')->get(),
            'active_tenants' => Contract::where('property_uuid', $property->uuid)->where('contracts.status','active')->distinct()->pluck('tenant_uuid'),
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($property->uuid),
            'batch_no' => $batch_no,
            'drafts' => $drafts,
            'property' => $property
        ]);
    }

    public function edit(Property $property, $batch_no)
    {
        $particulars = Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', Session::get('property'))
        ->get();

        return view('bills.edit', [
            'batch_no' => $batch_no,
            'particulars' => $particulars
        ]);
    }

    public function destroy($unit_uuid){
        Bill::where('unit_uuid', $unit_uuid)->delete();
    }

    public function confirm_bill_deletion(Property $property, $batch_no, $bills_count){
        $bills = Bill::where('property_uuid', $property->uuid)->where('batch_no', $batch_no)->get();

        return view('properties.bills.confirm-deletion', [
            'bills' => $bills,
            'view' => 'listView',
            'isPaymentAllowed' => false,
        ]);
    }
}
