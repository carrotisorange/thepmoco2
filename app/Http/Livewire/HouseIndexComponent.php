<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\House;

class HouseIndexComponent extends Component
{
    public function render()
    {
        $houses =  House::where('property_uuid', Session::get('property_uuid'))->get();

        return view('livewire.house-index-component',[
            'houses' => $houses
        ]);
    }
}
