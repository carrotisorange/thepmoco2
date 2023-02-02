<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Contract;
use Session;
use App\Models\Bill;

class PropertyBillController extends Controller
{
    public function index(Property $property, $batch_no=null, $drafts=0){
        $this->authorize('is_account_receivable_read_allowed');
                
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',10);

        return view('properties.bills.index',[
            'active_contracts' => Contract::where('property_uuid', Session::get('property'))->where('status', 'active')->get(),
            'active_tenants' => Contract::where('property_uuid', Session::get('property'))->where('contracts.status','active')->distinct()->pluck('tenant_uuid'),
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($property->uuid),
            'batch_no' => $batch_no,
            'drafts' => $drafts
        ]);
    }

    public function destroy($unit_uuid){
        Bill::where('unit_uuid', $unit_uuid)->delete();
    }
}
