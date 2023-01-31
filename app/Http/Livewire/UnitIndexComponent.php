<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\Property;
use Session;
use Livewire\WithPagination;
use Illuminate\Support\Str;

use Livewire\Component;

class UnitIndexComponent extends Component
{
    use WithPagination;

    public $property;
    public $batch_no;

    //filter fields
    public $search = '';
    public $selectedUnits = [];
    public $view = 'thumbnail';
    public $status_id;
    public $category_id;
    public $is_enrolled = [];
    public $building_id;
    public $floor_id = [];
    public $rent = [];
    public $discount = [];
    public $size = [];
    public $occupancy = [];
    public $sortBy;
    public $orderBy;
    public $property_uuid;
    public $limitDisplayTo = 10;

    public $totalUnitsCount;

    public $numberOfUnitsToBeCreated;

    public function changeView($value)
    {
        $this->view = $value;
        
    }

    public function clearFilters()
    {
        $this->sortBy = '';
        $this->orderBy = '';  
        $this->search = '';
        $this->status_id = '';
        $this->category_id = '';
        $this->building_id = '';
        $this->limitDisplayTo = 10;
    }

    public function mount(){
        $this->property_uuid = Session::get('property');
        $this->totalUnitsCount = Property::find(Session::get('property'))->units->count();
    }

    public function get_units($property_uuid)
    {
      return Unit::search($this->search)
      ->when(((!$this->sortBy) && (!$this->orderBy)), function($query){
      // $query->orderBy($this->sortBy, $this->orderBy);
        $query ->orderByRaw('LENGTH(unit) ASC')->orderBy('unit', 'asc');
      })
       ->when(($this->sortBy && $this->orderBy), function($query){
        // $query->orderBy($this->sortBy, $this->orderBy);
        $query->orderBy($this->sortBy, $this->orderBy);
       })

      ->where('property_uuid', $property_uuid)
      ->when($this->status_id, function($query){
      $query->where('status_id',$this->status_id);
      })
      ->where('property_uuid', $property_uuid)
      ->when($this->category_id, function($query){
      $query->where('category_id', $this->category_id);
      })
      ->when($this->building_id, function($query){
      $query->where('building_id', $this->building_id);
      })
      ->when($this->is_enrolled, function($query){
      $query->whereIn('is_enrolled', $this->is_enrolled);
      })
      ->when($this->floor_id, function($query){
      $query->whereIn('floor_id', $this->floor_id);
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
    ->when($this->batch_no, function($query){
      $query->where('batch_no', $this->batch_no);
      })
      ->paginate($this->limitDisplayTo);
    }

    public function editUnits(){
      sleep(2);

      return redirect('/property/'.Session::get('property').'/unit/all/edit');
    }

   public function render()
    {
        return view('livewire.unit-index-component',[
            'units' => $this->get_units($this->property_uuid),
            'statuses' => app('App\Http\Controllers\StatusController')->index($this->property_uuid),
            'categories' => app('App\Http\Controllers\CategoryController')->index($this->property_uuid),
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index($this->property_uuid),
            'floors' => app('App\Http\Controllers\FloorController')->index($this->property_uuid),
            'rents' => app('App\Http\Controllers\UnitController')->get_property_unit_rents(Session::get('property')),
            'discounts' => app('App\Http\Controllers\UnitController')->get_property_unit_discounts(Session::get('property')),
            'sizes' => app('App\Http\Controllers\UnitController')->get_property_unit_sizes(Session::get('property')),
            'occupancies' => app('App\Http\Controllers\UnitController')->get_property_unit_occupancies(Session::get('property')),
            'enrollment_statuses' => app('App\Http\Controllers\UnitController')->get_property_unit_enrollment_statuses(Session::get('property')),
            'units_count' => Property::find(Session::get('property'))->units->count()
        ]);
    }
}
