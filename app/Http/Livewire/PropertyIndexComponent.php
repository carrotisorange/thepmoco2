<?php

namespace App\Http\Livewire;
use App\Models\UserProperty;
use Livewire\Component;
use App\Models\Feature;

class PropertyIndexComponent extends Component
{
    public $search;
    public $sortBy;
    public $filterByPropertyType;
    public $limitDisplayTo = 16;
    public $propertyView = 'thumbnail';

    public function clearFilters(){
        $this->search = null;
        $this->sortBy = null;
        $this->filterByPropertyType = null;
        $this->limitDisplayTo = null;
    }

    public function changePropertyView($value)
    {
        $this->propertyView = $value;
    }

    public function render()
    {
        $userId = auth()->user()->id;
        $properties  = app('App\Http\Controllers\Features\PropertyController')->get_properties($userId, $this->search,$this->sortBy, $this->filterByPropertyType, $this->limitDisplayTo);
        $propertyTypes = app('App\Http\Controllers\Features\PropertyController')->get_property_types(auth()->user()->id);
        $userPropertyCount = UserProperty::where('user_id', $userId)->count();

        $featureId = 19;

        $propertySubFeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $propertySubfeaturesArray = explode(",", $propertySubFeatures);

        return view('livewire.property-index-component',[
            'properties' => $properties,
            'propertyTypes' => $propertyTypes,
            'userPropertyCount' => $userPropertyCount,
            'propertySubfeaturesArray' => $propertySubfeaturesArray,
        ]);
    }



}
