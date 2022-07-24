<?php

namespace App\Http\Controllers;
use App\Models\Tenant;
use DB;

use Illuminate\Http\Request;

class TenantLedgerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Tenant $tenant)
    {
        // $bills = DB::table('bills')->select('bill_no as no','bill as amount', 'created_at')->where('tenant_uuid', $tenant->uuid)->groupBy('id')->get();

        // $collections = DB::table('collections')->select('ar_no as no','collection as amount','created_at')->where('tenant_uuid', $tenant->uuid)->groupBy('bill_id')->get();

        // $ledgers = $bills->merge($collections);

        $bills = Tenant::find($tenant->uuid)
        ->bills()
        ->whereIn('status', ['paid', 'partially_paid'])
        ->get();

        $collections = Tenant::find($tenant->uuid)
        ->collections()
        ->get();

        $ledgers = $bills->merge( $collections);

        return view('tenants.ledgers.index', [
            'tenant' => $tenant,
            'bills'=> $bills,
            'collections'=> $collections,
            'ledgers' => $ledgers
        ]);
    }
}
