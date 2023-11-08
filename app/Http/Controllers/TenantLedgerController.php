<?php

namespace App\Http\Controllers;
use App\Models\Tenant;
use DB;

use Illuminate\Http\Request;

class TenantLedgerController extends Controller
{
    public function index(Tenant $tenant)
    {
        $bills = Tenant::find($tenant->uuid)
        ->bills()
        ->posted()
        ->where('status','paid')
        ->get();

        $collections = Tenant::find($tenant->uuid)
        ->collections()
        ->get();

        $ledgers = $bills->merge( $collections);

        return view('features.tenants.ledgers.index', [
            'tenant' => $tenant,
            'bills'=> $bills,
            'collections'=> $collections,
            'ledgers' => $ledgers
        ]);
    }
}
