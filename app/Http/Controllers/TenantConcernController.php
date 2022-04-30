<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantConcernController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Tenant $tenant)
    {
         return view('tenants.concerns.index',[
         'tenant' => Tenant::find($tenant->uuid),
         'concerns' => Tenant::find($tenant->uuid)->concerns
         ]);
    }
}
