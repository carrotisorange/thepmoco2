<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Plan;

class UnitCreateComponent extends Component
{
    public $numberOfUnitsToBeCreated = 1;
    public $unitLimits;

    public function mount(){
        $this->unitLimits = Plan::find(auth()->user()->plan_id)->description;
    }

    protected function rules()
    {
        return [
            'numberOfUnitsToBeCreated' => 'required',
        ];
    }

    public function storeUnit(){

        $this->validate();

        app('App\Http\Controllers\Features\UnitController')->store($this->numberOfUnitsToBeCreated);

        app('App\Http\Controllers\Utilities\PointController')->store($this->numberOfUnitsToBeCreated, 5);

        $propertyTenantsCount = app('App\Http\Controllers\Features\TenantController')->get()->count();

        if($propertyTenantsCount == 0){
            return redirect('/property/'.Session::get('property_uuid').'/tenant/')->with('success', 'Changes Saved!');
        }else{
            return redirect('/property/'.Session::get('property_uuid').'/unit/')->with('success', 'Changes Saved!');
        }

    }
    public function render()
    {
        return view('livewire.unit-create-component');
    }
}
