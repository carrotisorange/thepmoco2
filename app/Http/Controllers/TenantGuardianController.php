<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Property;
use App\Models\Guardian;

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
