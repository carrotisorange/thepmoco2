<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Session;

class ContractIndexComponent extends Component
{
    public function render()
    {
        return view('livewire.contract-index-component',[
            'contracts' => Property::find(Session::get('property'))->contracts()->paginate(10)
        ]);
    }
}
