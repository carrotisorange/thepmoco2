<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Property;
use App\Models\Wallet;

class TenantWalletController extends Controller
{
    public function index($tenant_uuid){
        return Tenant::find($tenant_uuid)->wallets;
    }

    public function create(Property $property, Tenant $tenant){
        return view('features.tenants.wallets.create',[
            'tenant' => $tenant
        ]);
    }

    public function store($tenant_uuid, $amount, $description)
    {
        Wallet::create([
            'tenant_uuid' => $tenant_uuid,
            'amount' => $amount,
            'description' => $description
        ]);
    }
}
