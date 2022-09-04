<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;

class DashboardTenantController extends Controller
{
    public function index($role_id, User $user)
    {
        return view('portal.tenants.index',[
            'tenant' => Tenant::findOrFail($user->tenant_uuid)->tenant,
            'contracts' => Tenant::findOrFail($user->tenant_uuid)->contracts,
            'unpaid_bills' => Tenant::findOrFail($user->tenant_uuid)->bills()->whereIn('status', ['unpaid', 'partially_paid']),
            'concerns' => Tenant::findOrFail($user->tenant_uuid)->concerns,
            'payments' => Tenant::findOrFail($user->tenant_uuid)->collections()->orderBy('created_at', 'desc')->limit(5)->get(),
        ]);
    }

    public function show_contracts($role_id, User $user)
    {        
        return view('portal.tenants.contracts',[
            'contracts' => Tenant::findOrFail($user->tenant_uuid)->contracts()->orderBy('start', 'desc')->paginate(5)
        ]);
    }

    public function show_bills($role_id, User $user)
    {
        return view('portal.tenants.bills',[
            'bills' => Tenant::findOrFail($user->tenant_uuid)->bills()->orderBy('bill_no', 'desc')->paginate(5)
        ]);
    }

    public function show_collections($role_id, User $user)
    {
        return view('portal.tenants.collections',[
            'collections' => Tenant::findOrFail($user->tenant_uuid)->acknowledgementreceipts()->orderBy('ar_no','desc')->paginate(5)
        ]);
    }

    public function show_concerns($role_id, User $user)
    {
        return view('portal.tenants.concerns',[
            'concerns' => Tenant::find($user->tenant_uuid)->concerns()->paginate(5)
        ]);
    }
}
