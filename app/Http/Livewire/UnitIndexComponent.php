<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Session;
use App\Models\{Unit, Plan};

class UnitIndexComponent extends Component
{
    use WithPagination;

    public $batch_no;
    public $search = '';
    public $selectedUnits = [];
    public $view = 'thumbnail';
    public $status_id;
    public $category_id;
    public $building_id;
    public $sortBy;
    public $orderBy;

    public $numberOfUnitsToBeCreated = 1;

    public function storeUnit(){

        app('App\Http\Controllers\Features\UnitController')->store($this->numberOfUnitsToBeCreated);

        app('App\Http\Controllers\Utilities\PointController')->store($this->numberOfUnitsToBeCreated, 5);

        $propertyTenantsCount = app('App\Http\Controllers\Features\TenantController')->get()->count();

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

    public function get_units()
    {
      return Unit::search($this->search)
        ->where('property_uuid', Session::get('property_uuid'))
        ->when(((!$this->sortBy) && (!$this->orderBy)), function($query){
        $query ->orderByRaw('LENGTH(unit) ASC')->orderBy('unit', 'asc');
        })
        ->when(($this->sortBy && $this->orderBy), function($query){
            $query->orderBy($this->sortBy, $this->orderBy);
        })
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
        ->when($this->batch_no, function($query){
        $query->where('batch_no', $this->batch_no);
        })
        ->paginate(100);
    }

    public function editUnits(){
      return redirect('/property/'.Session::get('property_uuid').'/unit/all/edit');
    }

   public function render()
    {
        $steps = app('App\Http\Controllers\Utilities\TypeController')->getSteppers();
        $propertyUnitCount = app('App\Http\Controllers\Features\UnitController')->get()->count();
        $units = $this->get_units();
        $statuses = app('App\Http\Controllers\Features\UnitController')->get('','status_id');
        $categories = app('App\Http\Controllers\Features\UnitController')->get('','category_id');
        $buildings = app('App\Http\Controllers\Features\UnitController')->get('','building_id');
        $unitLimits = Plan::find(auth()->user()->plan_id)->description;

        return view('livewire.features.unit.unit-index-component', compact(
            'units',
            'statuses',
            'categories',
            'buildings',
            'steps',
            'propertyUnitCount',
            'unitLimits'
        ));
    }
}
