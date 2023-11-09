<?php

namespace App\Http\Controllers;

use App\Models\{Tenant,Property,Reference};

class TenantReferenceController extends Controller
{
    public function create(Property $property, Tenant $tenant){
        return view('features.tenants.references.create',[
            'tenant'=> $tenant
        ]);
    }

    public function destroy($tenant_uuid){
        Reference::where('tenant_uuid', $tenant_uuid)->delete();
    }
}
