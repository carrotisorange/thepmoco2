<?php

namespace App\Http\Livewire;
use App\Models\House;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Session;

use Livewire\Component;

class HouseEditBulkComponent extends Component
{
    use WithPagination;

    public $batch_no;

    public $search;

    public $houses;

    public function mount($batch_no)
    {
        $this->batch_no = $batch_no;
        $this->houses = $this->get_houses();
    }

    protected function rules()
    {
        return [
            'houses.*.house' => 'required',
            'houses.*.status_id' => ['nullable', Rule::exists('statuses', 'id')],
            'houses.*.address' => 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateHouse()
    {
        $validatedData = $this->validate();

        try{
            foreach ($this->houses as $house) {
               $house->save();
            }

            $tenants_count = Tenant::where('property_uuid', Session::get('property_uuid'))->count();

            //redirect user with a success message
            if($tenants_count)
            {
                return redirect('/property/'.Session::get('property_uuid').'/house/')->with('success', 'Changes Saved!');
            }
            else
            {

                return redirect('/property/'.Session::get('property_uuid').'/house/')->with('success', 'Changes Saved!');

            }

        }catch(\Exception $e){
            return redirect(url()->previous())->with('error', $e);
        }


    }


    public function get_houses()
    {
        $houses = House::search($this->search)
        ->where('property_uuid', Session::get('property_uuid'))
        ->orderBy('created_at', 'desc')
        ->get();

        if($this->batch_no != 'all'){
            $houses = $houses->where('batch_no', $this->batch_no);
        }

        return $houses;
    }

    public function render()
    {
        return view('livewire.house-edit-bulk-component',[
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index(Session::get('property_uuid')),
            'floors' => app('App\Http\Controllers\FloorController')->index(null),
            'categories' => app('App\Http\Controllers\CategoryController')->index(null),
            'statuses' => app('App\Http\Controllers\StatusController')->index(null),
        ]);
    }
}
