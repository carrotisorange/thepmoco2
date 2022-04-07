<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Status;
use Session;
use Livewire\WithPagination;
use DB;

use Livewire\Component;

class UnitIndexComponent extends Component
{

    use WithPagination;

    public $search = '';

    public $category_id = '';
    public $is_enrolled = '';
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
          ->where('units.status_id','!=' , '6')
          ->paginate(5);

          $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
          ->select('building', DB::raw('count(*) as count'))
          ->distinct()
          ->where('property_buildings.property_uuid', Session::get('property'))
          ->where('buildings.building','!=','NA')
          ->groupBy('building')
          ->get();

           $floors = Floor::join('units', 'floors.id', 'units.floor_id')
         ->select('floor', DB::raw('count(*) as count'))
          ->where('units.property_uuid', Session::get('property'))
           ->where('floors.floor','!=','NA')
           ->groupBy('floor')
          ->get();

          $categories = Category::join('units', 'categories.id', 'units.category_id')
           ->select('category', DB::raw('count(*) as count'))
    
          ->where('units.property_uuid', Session::get('property'))
           ->where('categories.category','!=','NA')
           ->groupBy('category')
          ->get();

          $rents = Unit::where('units.property_uuid', Session::get('property'))
          ->select('rent', DB::raw('count(*) as count'))
          ->where('rent','>',0)
        ->groupBy('rent')
          ->get();

          $discounts = Unit::where('units.property_uuid', Session::get('property'))
          ->select('discount', DB::raw('count(*) as count'))
           ->where('discount','>',0)
          ->groupBy('discount')
          ->get();

          $sizes = Unit::where('units.property_uuid', Session::get('property'))
          ->whereNotNull('size')
          ->select('size', DB::raw('count(*) as count'))
          ->where('size','>',0)
          ->groupBy('size')
          ->get();

         $statuses = Status::join('units', 'statuses.id', 'units.status_id')
          ->select('status', DB::raw('count(*) as count'))
         ->where('units.property_uuid', Session::get('property'))
         ->where('statuses.status','!=','NA')
         ->groupBy('status')
         ->get();

        $enrollment_statuses = Unit::where('units.property_uuid', Session::get('property'))
         //->whereNotNull('size')
         ->select('is_enrolled', DB::raw('count(*) as count'))
         //->where('size','>',0)
         ->groupBy('is_enrolled')
         ->orderBy('is_enrolled', 'desc')
         ->get();

        return view('livewire.unit-index-component',[
            'units' => $units,
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'rents' => $rents,
            'discounts' => $discounts,
            'sizes' => $sizes,
            'statuses' => $statuses,
            'enrollment_statuses' => $enrollment_statuses
        ]);
    }
}
