<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantContractController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Tenant $tenant)
    {
        return view('tenants.contracts.index',[
            'tenant' => Tenant::find($tenant->uuid),
            'contracts' => Tenant::find($tenant->uuid)->contracts,
        ]);
    }
}
