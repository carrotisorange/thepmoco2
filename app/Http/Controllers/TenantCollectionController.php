<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantCollectionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Tenant $tenant)
    {
        return view('tenants.collections.index',[
        'tenant' => Tenant::find($tenant->uuid),
        'collections' => Tenant::find($tenant->uuid)->collections
        ]);
    }
}
