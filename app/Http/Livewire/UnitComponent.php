<?php

namespace App\Http\Livewire;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Floor;
use App\Models\Unit;
use App\Models\Property;
use Session;
use DB;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use App\Models\Contract;
use App\Models\Tenant;

use Livewire\Component;

class UnitComponent extends Component
{
    use WithPagination;

    public $batch_no;
    public $units;

    public $selectedUnits =[];
    public $selectedAllUnits = false;

    public function mount($batch_no)
    {
        $this->batch_no = $batch_no;
        $this->units = $this->get_units();
    }

    protected function rules()
    {
        return [
            'units.*.unit' => 'required',
            'units.*.building_id' => ['nullable', Rule::exists('buildings', 'id')],
            'units.*.floor_id' => ['nullable', Rule::exists('floors', 'id')],
            'units.*.category_id' => ['nullable', Rule::exists('categories', 'id')],
            'units.*.rent' => 'nullable',
            'units.*.size' => 'nullable',
            'units.*.occupancy' => 'nullable'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedSelectedAllUnits($selectedAllUnits)
    {   
        if($selectedAllUnits)
        {
            $this->selectedUnits = $this->get_units()->pluck('uuid');
        }else
        {
            $this->selectedUnits = [];
        }
    }

    public function removeUnits()
    {
        foreach($this->selectedUnits as $unit=>$val ){
            Unit::destroy($unit);
        }

        // $this->selectedUnits = [];

        $this->units = $this->get_units();

        session()->flash('success', count($this->selectedUnits). ' unit is successfully removed.');
    }

    public function submitForm()
    {
        sleep(1);

        try{
            DB::beginTransaction();

            foreach ($this->units as $unit) {
                $unit->save();
            }

            DB::commit();

            session()->flash('success', count($this->selectedUnits). ' unit is successfully updated.');

        }catch(\Exception $e){
            DB::rollback();

            session()->flash('error');
        }
    }

    public function render()
    {
        $units = $this->get_units();

        $buildings = app('App\Http\Controllers\PropertyBuildingController')->index();
        
        $floors = app('App\Http\Controllers\FloorController')->index();

        $categories = app('App\Http\Controllers\CategoryController')->index();

        return view('livewire.unit-component',[
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'units' => $units
        ]);
    }

    public function get_units()
    {
        return Property::find(Session::get('property'))
        ->units()
        ->orderBy('created_at', 'desc')
        ->get();
    }

}
