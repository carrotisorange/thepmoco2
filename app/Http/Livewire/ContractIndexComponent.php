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
        

        // Session::put('tenant_uuid', $tenant->uuid);

        return redirect('/property/'.Session::get('property_uuid').'/tenant');
    }

    public function clearFilters(){
        $this->status = null;
    }

    public function render()
    {   
        $statuses = Contract::where('property_uuid', $this->property->uuid)
        ->select('status')
        ->whereNotNull('status')
        ->groupBy('status')
        ->get();

        $contracts = Property::find($this->property->uuid)->contracts()
        ->when($this->status, function($query){
        $query->where('status',$this->status);
        })
        ->paginate(10);

        return view('livewire.contract-index-component',[
            'contracts' => $contracts,
            'statuses' => $statuses
        ]);
    }
}
