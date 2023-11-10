<?php

namespace App\Http\Livewire;

use Session;
use Livewire\Component;
use App\Models\{Property,Contract};

class ContractIndexComponent extends Component
{
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
        $statuses = Contract::where('property_uuid', Session::get('property_uuid'))
        ->select('status')
        ->whereNotNull('status')
        ->groupBy('status')
        ->get();

        $contracts = Property::find(Session::get('property_uuid'))->contracts()
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
