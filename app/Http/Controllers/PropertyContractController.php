<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Contract;
use App\Models\Unit;
use App\Models\Tenant;

class PropertyContractController extends Controller
{
    public function index(Property $property){

        // $this->authorize('is_contract_read_allowed');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',5);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.contracts.index',[
            'property' => $property
        ]);
    }

    public function destroy($unit_uuid, $tenant_uuid){
        Contract::where('unit_uuid', $unit_uuid)
        ->orWhere('tenant_uuid', $tenant_uuid)->delete();
    }

    public function show(Property $property, Unit $unit, Tenant $tenant, Contract $contract){

        // $this->authorize('is_contract_read_allowed');

        return view('properties.contracts.show',[
            'contract' => $contract,
            'tenant' => $tenant
        ]);
    }
}
