<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\Property;
use Session;
use Livewire\WithPagination;

use Livewire\Component;

class UnitIndexComponent extends Component
{
    use WithPagination;

    //filter fields
    public $search = '';
    public $selectedUnits = [];
    public $view = 'list';
    public $status_id = [];
    public $category_id = [];
    public $is_enrolled = [];
    public $building_id = [];
    public $floor_id = [];
    public $rent = [];
    public $discount = [];
    public $size = [];
    public $occupancy = [];

    public function changeView($value)
    {
        $this->view = $value;
    }

    public function get_units($property_uuid)
    {
      return Unit::search($this->search)
      ->orderByRaw('LENGTH(unit) ASC') ->orderBy('unit', 'ASC')
      ->where('property_uuid', $property_uuid)
      ->when($this->status_id, function($query){
      $query->whereIn('status_id',[ $this->status_id]);
      })
      ->when($this->building_id, function($query){
      $query->whereIn('building_id', $this->building_id);
      })
      ->when($this->is_enrolled, function($query){
      $query->whereIn('is_enrolled', $this->is_enrolled);
      })
      ->when($this->floor_id, function($query){
      $query->whereIn('floor_id', $this->floor_id);
      })
      ->when($this->category_id, function($query){
      $query->whereIn('category_id', $this->category_id);
      })
      ->when($this->rent, function($query){
      $query->whereIn('rent', $this->rent);
      })
      ->when($this->discount, function($query){
      $query->whereIn('discount', $this->discount);
      })
      ->when($this->size, function($query){
      $query->where('size', $this->size);
      })
      ->when($this->occupancy, function($query){
      $query->where('occupancy', $this->occupancy);
      })
      ->paginate(10);
    }

   public function render()
    {
        return view('livewire.unit-index-component',[
            'units' => $this->get_units(Session::get('property')),
            'statuses' => app('App\Http\Controllers\UnitController')->get_property_unit_statuses(Session::get('property')),
            'buildings' => app('App\Http\Controllers\UnitController')->get_property_unit_buildings(Session::get('property')),
            'floors' => app('App\Http\Controllers\UnitController')->get_property_unit_floors(Session::get('property')),
            'categories' => app('App\Http\Controllers\UnitController')->get_property_unit_categories(Session::get('property')),
            'rents' => app('App\Http\Controllers\UnitController')->get_property_unit_rents(Session::get('property')),
            'discounts' => app('App\Http\Controllers\UnitController')->get_property_unit_discounts(Session::get('property')),
            'sizes' => app('App\Http\Controllers\UnitController')->get_property_unit_sizes(Session::get('property')),
            'occupancies' => app('App\Http\Controllers\UnitController')->get_property_unit_occupancies(Session::get('property')),
            'enrollment_statuses' => app('App\Http\Controllers\UnitController')->get_property_unit_enrollment_statuses(Session::get('property')),
            'units_count' => Property::find(Session::get('property'))->units->count()
        ]);
    }
}
