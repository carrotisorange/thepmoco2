<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wallet;

class ContractMoveoutStep5Component extends Component
{
    public $contract;

    public function render()
    {
        return view('livewire.contract-moveout-step5-component',[
            'wallets' => Wallet::where('tenant_uuid', $this->contract->uuid)->get()
        ]);
    }
}
