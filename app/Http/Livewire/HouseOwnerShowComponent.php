<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feature;

class HouseOwnerShowComponent extends Component
{
    public $house_owner_details;

    public function render()
    {
        $featureId = 25;

        $houseOwnerSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $houseOwnerSubfeaturesArray = explode(",", $houseOwnerSubfeatures);

        return view('livewire.house-owner-show-component',[
            'houseOwnerSubfeaturesArray' => $houseOwnerSubfeaturesArray,
        ]);
    }
}
