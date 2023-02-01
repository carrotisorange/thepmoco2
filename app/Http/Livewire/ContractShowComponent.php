<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContractShowComponent extends Component
{
    public $contract;
    
    public function render()
    {
        return view('livewire.contract-show-component');
    }
}
