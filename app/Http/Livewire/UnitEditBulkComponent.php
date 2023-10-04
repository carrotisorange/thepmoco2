<?php

namespace App\Http\Livewire;
use App\Models\Unit;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Session;

use Livewire\Component;

class UnitEditBulkComponent extends Component
{
    use WithPagination;

    public $batch_no;

    public $search;

    public $units;

    public function mount($batch_no)
    {
        $this->batch_no = $batch_no;
        $this->units = $this->get_units();
    }

    protected function rules()
    {
        return [
            'units.*.unit' => 'required',
            // 'units.*.building_id' => ['nullable', Rule::exists('buildings', 'id')],
            'units.*.floor_id' => ['nullable', Rule::exists('floors', 'id')],
            'units.*.category_id' => ['nullable', Rule::exists('categories', 'id')],
            'units.*.rent' => 'nullable',
            'units.*.discount' => 'nullable',
            'units.*.size' => 'nullable',
            'units.*.occupancy' => 'nullable',
            'units.*.status_id' => ['nullable', Rule::exists('statuses', 'id')],
            'units.*.rent_type' => 'nullable',
            'units.*.transient_rent' => 'nullable',
            'units.*.transient_discount' => 'nullable',
            'units.*.rent_duration' => 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // public function updatedSelectAllUnits($selectedAllUnits)
    // {
    //     if($selectedAllUnits)
    //     {
    //         $this->selectedUnits = $this->get_units()->pluck('uuid');

    //     }else
    //     {
    //         $this->selectedUnits = [];
    //     }
    // }


    public function updateUnit()
    {
        $validatedData = $this->validate();

        try{
            foreach ($this->units as $unit) {
               $unit->save();
            }

            $tenants_count = Tenant::where('property_uuid', Session::get('property_uuid'))->count();

            //redirect user with a success message
            if($tenants_count)
            {
                return redirect('/property/'.Session::get('property_uuid').'/unit/')->with('success', 'Changes Saved!');
            }
            else
            {
                if(Session::get('property_type') == 'HOA'){
                    return redirect('/property/'.Session::get('property_uuid').'/unit/')->with('success', 'Changes Saved!');
                }else{
                    return redirect('/property/'.Session::get('property_uuid').'/tenant/')->with('success', 'Changes Saved!');
        }
            }

        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong.');
        }


    }

    // public function removeUnits()
    // {
    //     foreach($this->selectedUnits as $unit => $val){
    //         if(Contract::where('property_uuid', Session::get('property_uuid'))->where('unit_uuid', $unit)->count() || DeedOfSale::where('property_uuid', Session::get('property_uuid'))->where('unit_uuid', $unit)->count())
    //         {
    //            session()->flash('error', 'Unit cannot be removed.');
    //         }
    //         else{
    //             Unit::destroy($unit);

    //             app('App\Http\Controllers\PointController')->store(Session::get('property_uuid'), auth()->user()->id, -1, 5);

    //             $this->units = $this->get_units();

    //             session()->flash('success', 'Changes Saved!');
    //         }
    //     }
    //      $this->selectedUnits = [];
    // }

    public function get_units()
    {
        $units = Unit::search($this->search)
        ->where('property_uuid', Session::get('property_uuid'))
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
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index(Session::get('property_uuid')),
            'floors' => app('App\Http\Controllers\FloorController')->index(null),
            'categories' => app('App\Http\Controllers\CategoryController')->index(null),
            'statuses' => app('App\Http\Controllers\StatusController')->index(null),
        ]);
    }
}
