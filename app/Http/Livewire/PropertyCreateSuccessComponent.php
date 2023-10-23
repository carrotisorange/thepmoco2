<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;

class PropertyCreateSuccessComponent extends Component
{
    public function continueButton(){
        // if(Session::get('property_type_id') == 8 ){
        //     return redirect('/property/'.Session::get('property_uuid').'/house');
        // }
        // else{
            return redirect('/property/'.Session::get('property_uuid').'/unit');
        // }
    }

    public function render()
    {
        return view('livewire.property-create-success-component');
    }
}
