<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;

class ContractIndexComponent extends Component
{
    public function render()
    {
        $contracts = Contract::leftJoin('units', 'contracts.unit_uuid', 'units.uuid')
        ->select('*', 'contracts.status as contract_status', 'contracts.uuid as contract_uuid')
        ->leftJoin('tenants', 'contracts.tenant_uuid', 'tenants.uuid')
        ->leftJoin('buildings', 'units.building_id','buildings.id' )
        ->where('units.property_uuid', session('property'))
        ->groupBy('contracts.uuid')
        ->paginate(10);

        return view('livewire.contract-index-component', [
            'contracts' => $contracts
        ]);
    }
}
