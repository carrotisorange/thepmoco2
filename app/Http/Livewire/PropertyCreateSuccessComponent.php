<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PropertyCreateSuccessComponent extends Component
{
    public $property;

    public function redirectToUnitPage(){
        

        return redirect('property/'.$this->property->uuid.'/unit');
    }

    public function render()
    {
        return view('livewire.property-create-success-component');
    }
}
