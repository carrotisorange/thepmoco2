<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Session;
use App\Models\Tenant;

class PropertyTenantController extends Controller
{
    //core functions
    public function index(Property $property)
    {
        Session::forget('tenant_uuid');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',3);

        $tenants = $this->get_property_tenants($property->uuid);

        return view('properties.tenants.index',[
            'tenants'=>$tenants
        ]);
    }

    public function destroy($tenant_uuid){
       Tenant::where('uuid', $tenant_uuid)->delete();
    }

    //other functions

    public function get_property_tenants($property_uuid)
    {
        return Property::find($property_uuid)->tenants;
    }
}
