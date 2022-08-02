<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;

class DashboardTenantController extends Controller
{
    public function index(User $user)
    {
        return view('portal.tenants.index',[
            'tenant' => Tenant::find($user->tenant_uuid)->tenant
        ]);
    }

    public function show_contracts(User $user)
    {
        return view('portal.tenants.contracts',[
            'contracts' => Tenant::find($user->tenant_uuid)->contracts()->paginate(5)
        ]);
    }

    public function show_bills(User $user)
    {
        return view('portal.tenants.bills',[
            'bills' => Tenant::find($user->tenant_uuid)->bills()->paginate(5)
        ]);
    }

    public function show_payments(User $user)
    {
        return view('portal.tenants.payments',[
            'payments' => Tenant::find($user->tenant_uuid)->acknowledgementreceipts()->paginate(5)
        ]);
    }

    public function show_concerns(User $user)
    {
        return view('portal.tenants.concerns',[
            'concerns' => Tenant::find($user->tenant_uuid)->concerns
        ]);
    }
}
