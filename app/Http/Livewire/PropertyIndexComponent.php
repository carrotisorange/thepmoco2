<?php

namespace App\Http\Livewire;
use App\Models\UserProperty;
use Session;
use Livewire\Component;

class PropertyIndexComponent extends Component
{
    public $search;
    public $sortBy;
    public $filterByPropertyType;
    public $limitDisplayTo = 4;

    public function clearFilters(){
        $this->search = null;
        $this->sortBy = null;
        $this->filterByPropertyType = null;
        $this->limitDisplayTo = null;
    }

    public function redirectToTheProperty(){
        // if(Session::get('property_type') === 'HOA'){
            return redirect('/property/'.Session::get('property_uuid').'/unit');
        // }else{
        //     return redirect('/property/'.Session::get('property_uuid'));
        // }

    }

    public function render()
    {
        $userId = auth()->user()->id;
        $properties  = app('App\Http\Controllers\PropertyController')->get_properties($userId, $this->search,$this->sortBy, $this->filterByPropertyType, $this->limitDisplayTo);
        $propertyTypes = app('App\Http\Controllers\PropertyController')->get_property_types(auth()->user()->id);
        $userPropertyCount = UserProperty::where('user_id', $userId)->count();

        return view('livewire.property-index-component',[
            'properties' => $properties,
            'propertyTypes' => $propertyTypes,
            'userPropertyCount' => $userPropertyCount
        ]);
    }



}
