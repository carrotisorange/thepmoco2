<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;

class PropertyCreateSuccessComponent extends Component
{
    public function continueButton(){
        return redirect('/property/'.Session::get('property_uuid').'/house');
    }

    public function render()
    {
        return view('livewire.property-create-success-component');
    }
}
