<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Tenant;
use App\Models\Property;
use App\Models\Concern;


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

    public function edit(Property $property, Tenant $tenant, Concern $concern)
    {
        return view('tenants.concerns.edit',[
            'tenant' => $tenant,
            'concern' => $concern,
        ]);
    }

}
