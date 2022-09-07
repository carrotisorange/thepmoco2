<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use DB;

class UnitEditComponent extends Component
{
    public $unit_details;

    public $unit;
    public $building_id;
    public $floor_id;
    public $category_id;
    public $status_id;
    public $size;
    public $rent;
    public $discount;
    public $occupancy;

    public function mount($unit_details)
    {
        $this->unit = $unit_details->unit;
        $this->building_id = $unit_details->building_id;
        $this->floor_id = $unit_details->floor_id;
        $this->category_id = $unit_details->category_id;
        $this->status_id = $unit_details->status_id;
        $this->size = $unit_details->size;
        $this->rent = $unit_details->rent;
        $this->discount = $unit_details->discount;
        $this->occupancy = $unit_details->occupancy;
    }

    
    protected function rules()
    {
        return [
            'unit' => ['required', 'string', 'max:255'],
            'building_id' => [Rule::exists('property_buildings', 'id')],
            'floor_id' => ['required', Rule::exists('floors', 'id')],
            'status_id' => ['required', Rule::exists('statuses', 'id')],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'size' => 'required',
            'rent' => 'required',
            'discount' => 'required',
            'occupancy' => 'required'
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        sleep(1);
       
        $validatedData = $this->validate();
         
        try{

            DB::beginTransaction();
        
            $this->unit_details->update($validatedData);

            DB::commit();

            session()->flash('success', 'Unit is successfully updated.');    
            
        }catch(\Exception $e){
            DB::rollback();

            session()->flash('error');
        }
    }
    
    public function render()
    {
        return view('livewire.unit-edit-component',[
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index(),
            'floors' => app('App\Http\Controllers\FloorController')->index(),
            'categories' => app('App\Http\Controllers\CategoryController')->index(),
            'statuses' => app('App\Http\Controllers\StatusController')->index(),
            'bills' => app('App\Http\Controllers\BillController')->show_unit_bills($this->unit_details->uuid),
            'enrollees' => app('App\Http\Controllers\EnrolleeController')->show_unit_enrollees($this->unit_details->uuid)
        ]);
    }
}
