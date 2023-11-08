<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\Property;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Models\Plan;
use Session;
use App\Models\Feature;
use App\Models\Type;

use Livewire\Component;

class UnitIndexComponent extends Component
{
    use WithPagination;

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
    public $limitDisplayTo = 54;

    public $totalUnitsCount;

    public $numberOfUnitsToBeCreated;

    public $numberOfUnits = 1;

    public function storeUnits(){

      if(($this->numberOfUnits <= 0 || !$this->numberOfUnits)){
        return redirect(url()->previous())->with('error', 'Cannot accept value less than 0 or null.');
     }

      $batch_no = Str::random(8);

      $plan_unit_limit =  Plan::find(auth()->user()->plan_id)->description;

      $total_unit_created = Property::find(Session::get('property_uuid'))->units()->count() + 1;

        if($plan_unit_limit <= $total_unit_created){
           return redirect(url()->previous())->with('error', 'You have reached your plan unit limit.');
        }

       for($i=$this->numberOfUnits; $i>=1; $i--){
            Unit::create([
                'uuid' => Str::uuid(),
                'unit' => 'Unit '.$total_unit_created++,
                'building_id' => '1',
                'floor_id' => '1',
                'property_uuid' => Session::get('property_uuid'),
                'user_id' => auth()->user()->id,
                'batch_no' => $batch_no
            ]);
       }

        app('App\Http\Controllers\PointController')->store(Session::get('property_uuid'), auth()->user()->id, $this->numberOfUnits, 5);

        $propertyTenantsCount = Property::find(Session::get('property_uuid'))->tenants->count();

        if($propertyTenantsCount == 0){
            return redirect('/property/'.Session::get('property_uuid').'/tenant/')->with('success', 'Changes Saved!');
        }else{
            return redirect('/property/'.Session::get('property_uuid').'/unit/')->with('success', 'Changes Saved!');
        }


    }

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
    }

    public function mount(){
        $this->totalUnitsCount = Property::find(Session::get('property_uuid'))->units->count();
    }

    public function get_units()
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

      ->where('property_uuid', Session::get('property_uuid'))
      ->when($this->status_id, function($query){
      $query->where('status_id',$this->status_id);
      })
      ->where('property_uuid', Session::get('property_uuid'))
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
      return redirect('/property/'.Session::get('property_uuid').'/unit/all/edit');
    }

   public function render()
    {
        $stepper = Type::where('id', Session::get('property_type_id'))->pluck('stepper')->first();

        $steps = explode(",", $stepper);

        $propertyUnitCount = Property::find(Session::get('property_uuid'))->units()->count();

        return view('livewire.unit-index-component',[
            'units' => $this->get_units(),
            'statuses' => app('App\Http\Controllers\StatusController')->index(Session::get('property_uuid')),
            'categories' => app('App\Http\Controllers\CategoryController')->index(Session::get('property_uuid')),
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index(Session::get('property_uuid')),
            'floors' => app('App\Http\Controllers\FloorController')->index(Session::get('property_uuid')),
            'rents' => app('App\Http\Controllers\Features\UnitController')->getUnitRents(Session::get('property_uuid')),
            'discounts' => app('App\Http\Controllers\Features\UnitController')->getUnitDiscounts(Session::get('property_uuid')),
            'sizes' => app('App\Http\Controllers\Features\UnitController')->getUnitSizes(Session::get('property_uuid')),
            'occupancies' => app('App\Http\Controllers\Features\UnitController')->getUnitOccupancies(Session::get('property_uuid')),
            'enrollment_statuses' => app('App\Http\Controllers\Features\UnitController')->getUnitEnrollmentStatuses(Session::get('property_uuid')),
            'units_count' => Property::find(Session::get('property_uuid'))->units->count(),
            'steps' => $steps,
            'propertyUnitCount' => $propertyUnitCount,
            'unitLimits' => Plan::find(auth()->user()->plan_id)->description
        ]);
    }
}
