<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feature;
use Illuminate\Validation\Rule;
use Session;

class HouseShowComponent extends Component
{
    public $house_details;

    public $house;
    public $status_id;
    public $address;


    public function mount($house_details)
    {
        $this->house = $house_details->house;
        $this->address = $house_details->address;
        $this->status_id = $house_details->status_id;
    }

    protected function rules()
    {
        return [
            'house' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'status_id' => ['required', Rule::exists('statuses', 'id')],
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

     public function submitForm()
    {
        $validatedData = $this->validate();

        try{

            $this->house_details->update($validatedData);

            $featureId = 2;

            $restrictionId = 3;

            app('App\Http\Controllers\ActivityController')->store(Session::get('property_uuid'), auth()->user()->id,$restrictionId,$featureId);

            session()->flash('success', 'Changes Saved!');

        }catch(\Exception $e){

            session()->flash('error', 'Something went wrong.');
        }
    }

    public function render()
    {
        $featureId = 2;

        $unitSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $unitSubfeaturesArray = explode(",", $unitSubfeatures);

        return view('livewire.house-show-component',[
            'unitSubfeaturesArray' => $unitSubfeaturesArray,
            'statuses' => app('App\Http\Controllers\StatusController')->index(null),
        ]);
    }
}
