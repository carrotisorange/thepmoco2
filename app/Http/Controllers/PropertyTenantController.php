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

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        $tenants = $this->get_property_tenants($property->uuid);

        return view('properties.tenants.index',[
            'tenants'=>$tenants
        ]);
    }

    public function show(Property $property, Tenant $tenant)
    {
        //store activity for opening a particular tenant.
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens one',3);

        $list_of_all_relationships = app('App\Http\Controllers\RelationshipController')->index();

        return view('tenants.show',[
            'property' => $property,
            'tenant_details' => $tenant,
            'relationships' => $list_of_all_relationships
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

    public function unlock(Property $property)
    {
        return view('admin.restrictedpages.tenantportal');
    }
}
