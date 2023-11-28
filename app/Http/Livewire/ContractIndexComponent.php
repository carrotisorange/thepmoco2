<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;

class ContractIndexComponent extends Component
{
    public $status;

    public function redirectToUnitSelectionPage(){

        return redirect('/property/'.Session::get('property_uuid').'/tenant');
    }

    public function render()
    {
        $statuses = app('App\Http\Controllers\Features\ContractController')->get('','status');

        $contracts = app('App\Http\Controllers\Features\ContractController')->get($this->status);

        return view('livewire.features.contract.contract-index-component', compact(
            'contracts',
            'statuses'
        ));
    }
}
