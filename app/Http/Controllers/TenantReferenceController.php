<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Property;


class TenantReferenceController extends Controller
{
    public function create(Property $property, Tenant $tenant){
        return view('tenants.references.create',[
            'tenant'=> $tenant
        ]);
    }
}
