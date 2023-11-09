<?php

namespace App\Http\Controllers;

use App\Models\Contract;

class TransferContractController extends Controller
{
    public function index(Contract $contract)
    {
        return view('contracts.transfer',[
            'contract_details' => $contract
        ]);
    }
}
