<?php

namespace App\Http\Livewire;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Unit;
use App\Models\Property;
use Session;

use Livewire\Component;

class UnitComponent extends Component
{
    public $batch_no;
    public $unit_count;   

    public $selectedUnits =[];
    public $selectedAll = false;

    public function mount($batch_no, $unit_count)
    {
        $this->batch_no = $batch_no;
        $this->unit_count = $unit_count;
    }

    public function updatedSelectedAll($selectedAll)
    {   
        if($selectedAll)
        {
            $this->selectedUnits = Unit::where('property_uuid', Session::get('property'))->where('status_id',6)->pluck('uuid');
        }else
        {
            $this->selectedUnits = [];
        }
    }

    public function removeUnits()
    {
        Unit::destroy($this->selectedUnits);

        $this->selectedUnits = [];
        
        return redirect('units/'.$this->batch_no.'/edit')->with('success','Units succesfully removed.');
    }

    public function render()
    {
        $units = Unit::orderBy('unit', 'desc')
            ->where('property_uuid', Session::get('property'))
            ->where('status_id', 6)
            ->get();

        $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
        ->where('property_buildings.property_uuid', Session::get('property'))
        ->get();

        $floors = Floor::where('id', '!=', 1)->get();

        $categories = Category::where('id', '!=', 1)->get();

        return view('livewire.unit-component',[
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'units' => $units
        ]);
    }

}
