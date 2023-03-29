<?php

namespace App\Http\Livewire;
use App\Models\Unit;
use App\Models\Tenant;
use DB;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use App\Models\Contract;
use App\Models\DeedOfSale;
use App\Models\Enrollee;
use Session;

use Livewire\Component;

class UnitEditBulkComponent extends Component
{
    use WithPagination;

    public $property;
    public $batch_no;


    public $search;
    public $units;

    public $category_id;
    public $occupancy;
    public $rent;
    public $size;
    public $transient_rent;

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
            'units.*.unit' => 'required|max:25',
            'units.*.building_id' => ['nullable', Rule::exists('buildings', 'id')],
            'units.*.floor_id' => ['nullable', Rule::exists('floors', 'id')],
            'units.*.category_id' => ['nullable', Rule::exists('categories', 'id')],
            'units.*.rent' => 'nullable',
            'units.*.size' => 'nullable',
            'units.*.occupancy' => 'nullable',
            'units.*.status_id' => ['nullable', Rule::exists('statuses', 'id')],
            'units.*.rent_type' => 'nullable',
            'units.*.transient_rent' => 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedSelectAllUnits($selectedAllUnits)
    {   
        if($selectedAllUnits)
        {
            $this->selectedUnits = $this->get_units()->pluck('uuid');

        }else
        {
            $this->selectedUnits = [];
        }
    }


    public function updateUnit()
    {
        sleep (2);

        try{
            $this->validate();
            //update the selected unit
            DB::transaction(function () {
                foreach ($this->units as $unit) {
                    $unit->save();
                }
            });

            $tenants_count = Tenant::where('property_uuid', $this->property->uuid)->count();

            //redirect user with a success message
            if($tenants_count)
            {
                return redirect('/property/'.$this->property->uuid.'/unit/')->with('success', 'Success!');
            }
            else
            { 
                return redirect('/property/'.$this->property->uuid.'/tenant/')->with('success', 'Success!');
            }

        }catch(\Exception $e){
           ddd($e);
            session()->flash('error');
        }
    }

    public function removeUnits()
    {
        sleep(1);

        foreach($this->selectedUnits as $unit => $val){
            if(Contract::where('property_uuid', $this->property->uuid)->where('unit_uuid', $unit)->count() || DeedOfSale::where('property_uuid', $this->property->uuid)->where('unit_uuid', $unit)->count())
            {
               session()->flash('error', 'Unit cannot be removed.');
            }
            else{
                Unit::destroy($unit);

                app('App\Http\Controllers\PointController')->store($this->property->uuid, auth()->user()->id, -1, 5);
                
                $this->units = $this->get_units();

                session()->flash('success', 'Success!');
            }
        }
         $this->selectedUnits = [];
    }

    public function get_units()
    {   
        $units = Unit::search($this->search)
        ->where('property_uuid', $this->property->uuid)
        ->orderBy('created_at', 'desc')
        ->get();

        if($this->batch_no != 'all'){
            $units = $units->where('batch_no', $this->batch_no); 
        }

        return $units;
    }

    public function render()
    {
        return view('livewire.unit-edit-bulk-component',[
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index($this->property->uuid),
            'floors' => app('App\Http\Controllers\FloorController')->index(null),
            'categories' => app('App\Http\Controllers\CategoryController')->index(null),
            'statuses' => app('App\Http\Controllers\StatusController')->index(null),
        ]);
    }
}
