<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Illuminate\Support\Str;
use App\Models\Unit;


class ContractIndexComponent extends Component
{
    public $status;

    public $unit_uuid;

    protected function rules()
    {
        return [
                'unit_uuid' => 'required'
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function redirectToUnitSelectionPage(){
        $this->validate();

        return redirect('/property/'.Session::get('property_uuid').'/unit/'.$this->unit_uuid.'/tenant/'.Str::random(6).'/create');
    }

    public function render()
    {
        $statuses = app('App\Http\Controllers\Features\ContractController')->get('','status');

        $contracts = app('App\Http\Controllers\Features\ContractController')->get($this->status);

        $units = Unit::where('property_uuid', Session::get('property_uuid'))->get();

        return view('livewire.features.contract.contract-index-component', compact(
            'contracts',
            'statuses',
            'units'
        ));
    }
}
