<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayable;

class ViewAccountpayableComponent extends Component
{
    public AccountPayable $accountpayable;

    public function render()
    {
        return view('livewire.view-accountpayable-component');
    }
}
