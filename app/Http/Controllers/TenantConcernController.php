<?php

namespace App\Http\Controllers;

use App\Models\{Tenant,Property,Concern};

class TenantConcernController extends Controller
{
    public function index(Property $property, Tenant $tenant)
    {
        return view('features.tenants.concerns.index',[
         'tenant' => Tenant::find($tenant->uuid),
         'concerns' => Tenant::find($tenant->uuid)->concerns
         ]);
    }

    public function create(Property $property, Tenant $tenant){
        return view('features.tenants.concerns.create',[
            'tenant' => $tenant,

        ]);
    }

    public function destroy($tenant_uuid){
        Concern::where('tenant_uuid', $tenant_uuid)->delete();
    }

}
