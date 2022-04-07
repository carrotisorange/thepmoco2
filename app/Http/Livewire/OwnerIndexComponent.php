<?php

namespace App\Http\Livewire;

use App\Models\DeedOfSale;
use Livewire\Component;

class OwnerIndexComponent extends Component
{
    public $search = null;

    public function render()
    {
    $owners = DeedOfSale::leftJoin('units', 'deed_of_sales.unit_uuid', 'units.uuid')
    ->select('*', 'deed_of_sales.status as contract_status', 'deed_of_sales.uuid as contract_uuid')
    ->join('owners', 'deed_of_sales.owner_uuid', 'owners.uuid')
    ->join('buildings', 'units.building_id','buildings.id' )
    ->where('units.property_uuid', session('property'))
    //->groupBy('contract_uuid')
    ->where('owners.owner','LIKE' ,'%'.$this->search.'%')
    ->paginate(10);

    return view('livewire.owner-index-component', [
    'owners' => $owners
    ]);
    }
}
