<?php

namespace App\Http\Livewire;

use App\Models\HouseOwnership;
use Livewire\Component;
use App\Models\Property;
use Session;
use App\Models\Type;

class HouseOwnerIndexComponent extends Component
{
    public $search;

    public function render()
    {
        $propertyHouseOwnersCount = Property::find(Session::get('property_uuid'))->houseowners->count();

        $stepper = Type::where('id', Session::get('property_type_id'))->pluck('stepper')->first();

        $steps = explode(",", $stepper);

        return view('livewire.house-owner-index-component', [
        'houseOwners' => HouseOwnership::where('property_uuid', Session::get('property_uuid'))
        ->orderBy('created_at', 'asc')
        ->paginate(10),
        'propertyHouseOwnersCount' => $propertyHouseOwnersCount,
        'steps' => $steps
        ]);
    }
}
