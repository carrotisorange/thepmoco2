<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\Contract;
use Session;

class ContractIndexComponent extends Component
{
    public $property;

    public $status;
    
    public function redirectToUnitSelectionPage(){
        sleep(2);

        // Session::put('action', 'addnewcontract');

        return redirect('/property/'.Session::get('property').'/tenant');
    }

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
            ->get(),
            'statuses' => $statuses
        ]);
    }
}
