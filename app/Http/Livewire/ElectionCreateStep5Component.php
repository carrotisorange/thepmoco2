<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ElectionCreateStep5Component extends Component
{
    public $election;
    
    public function render()
    {
        return view('livewire.election-create-step5-component');
    }
}
