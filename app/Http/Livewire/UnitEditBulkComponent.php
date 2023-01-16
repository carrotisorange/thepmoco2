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

    public $batch_no;
    public $search;
    public $units;

    public $category_id;
    public $occupancy;
    public $rent;
    public $size;

    public $selectedUnits =[];

    public $selectedAllUnits = false;
    public $property_uuid;

    public function mount($batch_no)
    {
        $this->batch_no = $batch_no;
        $this->units = $this->get_units();
        $this->property_uuid = Session::get('property');
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

        try{
            $this->validate();
            //update the selected unit
            DB::transaction(function () {
                foreach ($this->units as $unit) {
                    $unit->save();
                }
            });

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
           
            session()->flash('error');
        }
    }

    // public function updateUnitInfo(){

    //     sleep(1);

    //     Unit::where('property_uuid', Session::get('property_uuid'))
    //     ->update([
    //         'category_id' => $this->category_id,
    //         'size' => $this->size,
    //         'rent' => $this->rent,
    //         'occupancy' => $this->occupancy
    //     ]);

    //     $this->units = $this->get_units();

    //     session()->flash('success', 'Parameters are successfully saved!');
    // }

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
        return Unit::search($this->search)
        ->where('property_uuid', Session::get('property'))
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function render()
    {

        return view('livewire.unit-edit-bulk-component',[
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index($this->property_uuid),
            'floors' => app('App\Http\Controllers\FloorController')->index(null),
            'categories' => app('App\Http\Controllers\CategoryController')->index(null),
        ]);
    }
}
