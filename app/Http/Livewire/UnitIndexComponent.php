<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Status;
use Session;
use Livewire\WithPagination;

use Livewire\Component;

class UnitIndexComponent extends Component
{

    use WithPagination;

    public $search = '';

    public $category_id = '';
    public $status_id = '';
    public $building_id = '';
    public $floor_id = '';
    public $rent = '';
    public $discount = '';
    public $size = '';

    public function render()
    {
          $units = Unit::leftJoin('statuses', 'units.status_id', 'statuses.id')
          ->select('*', 'units.*')
          ->leftJoin('categories', 'units.category_id', 'categories.id')
          ->leftJoin('buildings', 'units.building_id', 'buildings.id')
          ->leftJoin('floors', 'units.floor_id', 'floors.id')
          ->where('property_uuid', Session::get('property'))
          ->orderByRaw('LENGTH(unit)', 'ASC')
          ->where('units.unit','LIKE' ,'%'.$this->search.'%')
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

         $statuses = Status::join('units', 'statuses.id', 'units.status_id')
         ->select('status')
         ->distinct()
         ->where('units.property_uuid', Session::get('property'))
         ->where('statuses.status','!=','NA')
         ->get();

        return view('livewire.unit-index-component',[
            'units' => $units,
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'rents' => $rents,
            'discounts' => $discounts,
            'sizes' => $sizes,
            'statuses' => $statuses
        ]);
    }
}
