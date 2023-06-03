<?php

namespace App\Http\Livewire;

use App\Models\AccountPayable;
use Livewire\Component;

class ViewAccountpayableComponent extends Component
{
    public AccountPayable $accountpayable;
    
    public function render()
    {
        return view('livewire.view-accountpayable-component');
    }
}
