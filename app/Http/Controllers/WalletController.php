<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Property;
use App\Models\Tenant;
use App\Models\Unit;
use App\Models\Contract;

class WalletController extends Controller
{
    public function index($contract_uuid)
    {
       return Wallet::where('contract_uuid', $contract_uuid)->get();
    }

    public function get_deposits($tenant_uuid){
        return Wallet::where('tenant_uuid', $tenant_uuid)->get();
    }

    public function create(Property $property, Unit $unit, Tenant $tenant, Contract $contract)
    {
        return view('wallets.create',[
            'tenant' => $tenant,
            'unit' => $unit,
            'contract' => $contract
        ]);
    }

    public function store($tenant_uuid, $contract_uuid, $amount, $description)
    {
        Wallet::create([
            'tenant_uuid' => $tenant_uuid,
            'contract_uuid' => $contract_uuid,
            'amount' => $amount,
            'description' => $description
        ]);
    }
}
