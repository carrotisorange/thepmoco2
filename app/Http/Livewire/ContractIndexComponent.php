<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Session;
use App\Models\Contract;

class ContractIndexComponent extends Component
{
    public $property;

    public $status;
    // public $search;

    public function render()
    {   
        $statuses = Contract::where('property_uuid', $this->property->uuid)
        ->select('status')
        ->whereNotNull('status')
        ->groupBy('status')
        ->get();

        return view('livewire.contract-index-component',[
            'contracts' => Property::find($this->property->uuid)->contracts()
            ->when($this->status, function($query){
            $query->where('status',$this->status);
            })
            ->paginate(10),
            'statuses' => $statuses
        ]);
    }
}
