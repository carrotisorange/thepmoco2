<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;

class ContractIndexComponent extends Component
{
    public $search = null;

    public function render()
    {
        $contracts = Contract::leftJoin('units', 'contracts.unit_uuid', 'units.uuid')
        ->select('*', 'contracts.status as contract_status', 'contracts.uuid as contract_uuid', 'contracts.rent as contract_rent')
        ->join('tenants', 'contracts.tenant_uuid', 'tenants.uuid')
        ->join('buildings', 'units.building_id','buildings.id' )
        ->where('units.property_uuid', session('property'))
        //->groupBy('contract_uuid')
        ->where('tenants.tenant','LIKE' ,'%'.$this->search.'%')
        ->paginate(10);

        return view('livewire.contract-index-component', [
            'contracts' => $contracts
        ]);
    }
}
