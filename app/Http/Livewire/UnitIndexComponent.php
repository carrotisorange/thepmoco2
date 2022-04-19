<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Status;
use App\Models\Property;
use Session;
use Livewire\WithPagination;
use DB;

use Livewire\Component;

class UnitIndexComponent extends Component
{

    use WithPagination;

    public $search = '';

    public $status_id = [];
    public $category_id = [];
    public $is_enrolled = [];
    public $building_id = [];
    public $floor_id = [];
    public $rent = [];
    public $discount = [];
    public $size = [];

    public function resetFilters()
    {
       $this->search = '';
        $this->status_id = [];
      $this->category_id = [];
        $this->is_enrolled = [];
        $this->building_id = [];
        $this->floor_id = [];
       $this->rent = [];
        $this->discount = [];
        $this->size = [];
    }

    public function render()
    {

      $statuses = Status::join('units', 'statuses.id', 'units.status_id')
      ->select('status','statuses.id as status_id', DB::raw('count(*) as count'))
      ->where('units.property_uuid', Session::get('property'))
      ->where('statuses.status','!=','NA')
      ->groupBy('statuses.id')
      ->get();

          $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
          ->join('units', 'buildings.id', 'units.building_id')
          ->select('building','buildings.id as building_id', DB::raw('count(unit) as count'))
          ->distinct()
          ->where('property_buildings.property_uuid', Session::get('property'))
          ->where('buildings.building','!=','NA')
          ->groupBy('buildings.id')
          ->get();

           $floors = Floor::join('units', 'floors.id', 'units.floor_id')
        ->select('floor','floors.id as floor_id', DB::raw('count(*) as count'))
          ->where('units.property_uuid', Session::get('property'))
           ->where('floors.floor','!=','NA')
           ->groupBy('floors.id')
          ->get();

          $categories = Category::join('units', 'categories.id', 'units.category_id')
            ->select('category','categories.id as category_id', DB::raw('count(*) as count'))
          ->where('units.property_uuid', Session::get('property'))
           ->where('categories.category','!=','NA')
           ->groupBy('categories.id')
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


        $enrollment_statuses = Unit::where('units.property_uuid', Session::get('property'))
         ->select('is_enrolled', DB::raw('count(*) as count'))
         ->groupBy('is_enrolled')
         ->orderBy('is_enrolled', 'desc')
         ->get();

        return view('livewire.unit-index-component',[
            'units' => Unit::search($this->search)
                    ->orderBy('unit', 'desc')
                    ->where('property_uuid', Session::get('property'))
                    ->when($this->status_id, function($query){
                    $query->where('status_id', '=', $this->status_id);
                    })
                    ->when($this->building_id, function($query){
                    $query->where('building_id', '=', $this->building_id);
                    })
                    ->when($this->is_enrolled, function($query){
                    $query->where('is_enrolled', '=', $this->is_enrolled);
                    })
                    ->when($this->floor_id, function($query){
                    $query->where('floor_id', '=', $this->floor_id);
                    })
                    ->when($this->category_id, function($query){
                    $query->where('category_id', '=', $this->category_id);
                    })
                    ->when($this->rent, function($query){
                    $query->where('rent', '=', $this->rent);
                    })
                     ->when($this->discount, function($query){
                     $query->where('discount', '=', $this->discount);
                     })
                      ->when($this->size, function($query){
                      $query->where('size', '=', $this->size);
                      })
                    ->paginate(10),
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'rents' => $rents,
            'discounts' => $discounts,
            'sizes' => $sizes,
            'statuses' => $statuses,
            'enrollment_statuses' => $enrollment_statuses,
            'units_count' => Property::find(Session::get('property'))->units->count()
        ]);
    }
}
