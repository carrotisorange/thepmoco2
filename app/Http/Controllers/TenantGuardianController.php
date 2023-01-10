<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Property;

class TenantGuardianController extends Controller
{
    public function create(Property $property, Tenant $tenant){
        return view('tenants.guardians.create',[
            'tenant' => $tenant,
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
        ]);
    }
}
