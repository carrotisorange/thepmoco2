<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserCreateSuccessComponent extends Component
{
    public $user;
    
    public function render()
    {
        return view('livewire.user-create-success-component');
    }
}
