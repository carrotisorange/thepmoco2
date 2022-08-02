<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;

class DashboardTenantController extends Controller
{
    public function index()
    {
        return view('portal.tenants.index');
    }

    public function show_contracts(User $user)
    {
        return view('portal.tenants.contracts',[
            'contracts' => Tenant::find($user->tenant_uuid)->contracts
        ]);
    }

    public function show_bills(User $user)
    {
        return view('portal.tenants.bills',[
            'bills' => Tenant::find($user->tenant_uuid)->bills
        ]);
    }

    public function show_payments(User $user)
    {
        return view('portal.tenants.payments',[
            'payments' => Tenant::find($user->tenant_uuid)->acknowledgementreceipts
        ]);
    }

    public function show_concerns(User $user)
    {
        return view('portal.tenants.concerns',[
            'concerns' => Tenant::find($user->tenant_uuid)->concerns
        ]);
    }
}
