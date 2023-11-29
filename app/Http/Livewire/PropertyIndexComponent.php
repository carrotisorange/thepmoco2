<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserProperty;

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
        $properties  = app('App\Http\Controllers\PropertyController')->getPersonnelProperties($this->search,$this->sortBy, $this->filterByPropertyType, $this->limitDisplayTo);
        $propertyTypes = app('App\Http\Controllers\Utilities\TypeController')->getPropertyTypes();
        $userPropertyCount = UserProperty::where('user_id', auth()->user()->id)->where('is_approved',1)->count();

        $featureId = 19; //pleaser refer to the features table

        $steps = app('App\Http\Controllers\FeatureController')->getSubfeatures($featureId);

        return view('livewire.property-index-component',[
            'properties' => $properties,
            'propertyTypes' => $propertyTypes,
            'userPropertyCount' => $userPropertyCount,
            'steps' => $steps,
        ]);
    }



}
