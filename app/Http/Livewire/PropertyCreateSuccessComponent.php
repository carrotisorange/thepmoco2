<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;

class PropertyCreateSuccessComponent extends Component
{
    public function redirectToUnitPage(){
        return redirect('/property/'.Session::get('property_uuid').'/unit');
    }

    public function render()
    {
        return view('livewire.property-create-success-component');
    }
}
