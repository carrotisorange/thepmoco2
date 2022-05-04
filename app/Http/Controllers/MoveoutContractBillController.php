<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Tenant;

class MoveoutContractBillController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Contract $contract)
    {    
        return view('contracts.bills',[
            'contract' => $contract,
            'bills' => Tenant::find($contract->tenant->uuid)->bills()->orderBy('bill_no')->get(),
            'wallets' => Tenant::find($contract->tenant->uuid)->wallets,
        ]);
    }
}
