<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantBillController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Tenant $tenant)
    {
        return view('tenants.bills.index',[
            'tenant' => Tenant::find($tenant->uuid),  
            'bills' => Tenant::find($tenant->uuid)->bills
        ]);
    }
}
