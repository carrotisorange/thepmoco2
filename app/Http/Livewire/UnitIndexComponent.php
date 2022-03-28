<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Floor;
use Session;

use Livewire\Component;

class UnitIndexComponent extends Component
{
    public $search;
    public $category = null;

    public function render()
    {
          $units = Unit::leftJoin('statuses', 'units.status_id', 'statuses.id')
          ->select('*', 'units.*')
          ->leftJoin('categories', 'units.category_id', 'categories.id')
          ->leftJoin('buildings', 'units.building_id', 'buildings.id')
          ->leftJoin('floors', 'units.floor_id', 'floors.id')
          ->where('property_uuid', Session::get('property'))
          ->where('status_id', '!=', 6)
          ->orderByRaw('LENGTH(unit)', 'ASC')
          ->paginate(5);

          $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
          ->select('building')
          ->distinct()
          ->where('property_buildings.property_uuid', Session::get('property'))
          ->where('buildings.building','!=','NA')
          ->get();

          $floors = Floor::join('units', 'floors.id', 'units.floor_id')
          ->select('floor')
          ->distinct()
          ->where('units.property_uuid', Session::get('property'))
           ->where('floors.floor','!=','NA')
          ->get();

          $categories = Category::join('units', 'categories.id', 'units.category_id')
          ->select('category')
          ->distinct()
          ->where('units.property_uuid', Session::get('property'))
           ->where('categories.category','!=','NA')
          ->get();

          $rents = Unit::where('units.property_uuid', Session::get('property'))
          ->select('rent')
          ->distinct()
          ->get();

          $discounts = Unit::where('units.property_uuid', Session::get('property'))
          ->select('discount')
          ->distinct()
          ->get();

          $sizes = Unit::where('units.property_uuid', Session::get('property'))
          ->whereNotNull('size')
          ->select('size')
          ->distinct()
          ->get();

        return view('livewire.unit-index-component',[
            // 'units' => Unit::when($this->category, function($query){
            //     $query->where('category_id', $this->category);
            // })
            // ->search(trim($this->search)),
            'units' => $units,
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'rents' => $rents,
            'discounts' => $discounts,
            'sizes' => $sizes
        ]);
    }
}
