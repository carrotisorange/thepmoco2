<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UnitInventoryComponent extends Component
{
    public $unitDetails;
    
    public function render()
    {
        return view('livewire.unit-inventory-component');
    }
}
