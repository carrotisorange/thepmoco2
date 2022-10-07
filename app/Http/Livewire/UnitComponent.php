<?php

namespace App\Http\Livewire;
use App\Models\Unit;
use App\Models\Tenant;
use Session;
use App\Models\Property;
use DB;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use App\Models\Contract;
use App\Models\DeedOfSale;
use App\Models\Enrollee;

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
            'units.*.unit' => 'required|max:10',
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

    public function updateForm()
    {
        sleep (1);

        $this->validate();

        try{
            foreach ($this->units as $unit) {
                    $unit->save();
            }
            //redirect user with a success message
            if(Tenant::where('property_uuid', Session::get('property'))->count())
            {
                return redirect('/property/'.Session::get('property').'/unit')->with('success', count($this->units). ' unit is successfully updated.');
            }
            else
            { 
                return redirect('/property/'.Session::get('property').'/tenant')->with('success', count($this->units). ' unit is successfully updated.');
            }

        }catch(\Exception $e){
            
            //redirect user with an error message
            session()->flash('error');
        }
    }

    public function removeUnits()
    {
        sleep(1);

        foreach($this->selectedUnits as $unit => $val){
            if(Contract::where('property_uuid', Session::get('property'))->where('unit_uuid', $unit)->count() || Enrollee::where('property_uuid', Session::get('property'))->where('unit_uuid', $unit)->count() || DeedOfSale::where('property_uuid', Session::get('property'))->where('unit_uuid', $unit)->count())
            {
               session()->flash('error', 'Unit cannot be removed.');
            }
            else{
                Unit::destroy($unit);

                app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, -1, 5);
                
                $this->units = $this->get_units();

                session()->flash('success', count($this->selectedUnits).' Unit is successfully removed.');
            }
        }
         $this->selectedUnits = [];
    }

    public function get_units()
    {
        return Property::find(Session::get('property'))
        ->units()
        ->orderBy('created_at', 'desc')
        ->get();
    }
    public function render()
    {
        return view('livewire.unit-component',[
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index(),
            'floors' => app('App\Http\Controllers\FloorController')->index(),
            'units' => $this->get_units(),
            'categories' => app('App\Http\Controllers\CategoryController')->index(),
        ]);
    }
}
