<?php

namespace App\Http\Controllers;

use App\Models\{Tenant,Property,Guardian};

class TenantGuardianController extends Controller
{
    public function create(Property $property, Tenant $tenant){
        return view('features.tenants.guardians.create',[
            'tenant' => $tenant,
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
        ]);
    }

    public function destroy($tenant_uuid){
        Guardian::where('tenant_uuid', $tenant_uuid)->delete();
    }

}
