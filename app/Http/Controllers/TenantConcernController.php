<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Property;


class TenantConcernController extends Controller
{
    public function index(Property $property, Tenant $tenant)
    {
         return view('tenants.concerns.index',[
         'tenant' => Tenant::find($tenant->uuid),
         'concerns' => Tenant::find($tenant->uuid)->concerns
         ]);
    }

    public function create(Property $property, Tenant $tenant){
        return view('tenants.concerns.create',[
            'tenant' => $tenant,
            
        ]);
    }

}
