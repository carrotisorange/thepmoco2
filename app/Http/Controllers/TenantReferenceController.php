<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Property;
use App\Models\Reference;


class TenantReferenceController extends Controller
{
    public function create(Property $property, Tenant $tenant){
        return view('tenants.references.create',[
            'tenant'=> $tenant
        ]);
    }

    public function destroy($tenant_uuid){
        Reference::where('tenant_uuid', $tenant_uuid)->delete();
    }
}
