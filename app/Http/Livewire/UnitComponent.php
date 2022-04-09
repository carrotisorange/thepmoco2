<?php

namespace App\Http\Livewire;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Unit;
use Session;

use Livewire\Component;

class UnitComponent extends Component
{
    public $batch_no;
    public $unit_count;   

    public function mount($batch_no, $unit_count)
    {
        $this->batch_no = $batch_no;
        $this->unit_count = $unit_count;
    }

    public $selected = [];

    public function deleteUnits()
    {
        dd($this->selected);
    }

    public function render()
    {

        $units = Unit::leftJoin('categories', 'units.category_id','categories.id')
          ->leftJoin('statuses', 'units.status_id', 'statuses.id')
          ->leftJoin('buildings', 'units.building_id', 'buildings.id')
          ->leftJoin('floors', 'units.floor_id', 'floors.id')
          ->where('batch_no', $this->batch_no)
          ->orderByRaw('LENGTH(unit)', 'ASC')
          ->orderBy('units.unit')
          ->get();

        $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
        ->where('property_buildings.property_uuid', Session::get('property'))
        ->get();

        $floors = Floor::all();

        $categories = Category::all();

        return view('livewire.unit-component',[
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'units' => $units
        ]);
    }

}
