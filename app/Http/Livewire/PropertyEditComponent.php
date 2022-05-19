<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use DB;
use App\Models\Property;
use App\Models\UserProperty;
use App\Models\PropertyParticular;
use App\Models\PropertyRole;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use App\Models\Type;

use Livewire\Component;

class PropertyEditComponent extends Component
{
    use WithFileUploads;

    public $property_details;
    public $property;
    public $type_id;
    public $thumbnail;
    public $description;

    public $country_id;
    public $province_id;
    public $city_id;
    public $barangay;

    public function mount($property_details)
    {
        $this->property = $property_details->property;
        $this->type_id = $property_details->type_id;
        $this->thumbnail = $property_details->thumbnail;
        $this->country_id = $property_details->country_id;
        $this->province_id = $property_details->province_id;
        $this->city_id = $property_details->city_id;
        $this->barangay = $property_details->barangay;
        $this->status = $property_details->status;
    }

    protected function rules()
    {
        return [
           'property' => 'required',
           'type_id' => ['required', Rule::exists('types', 'id')],
           'thumbnail' => 'nullable',
           'description' => 'nullable',
           'country_id' => ['required', Rule::exists('countries', 'id')],
           'province_id' => ['required', Rule::exists('provinces', 'id')],
           'city_id' => ['nullable', Rule::exists('cities', 'id')],
           'barangay' => ['nullable'],
           'status' => ['required']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateForm()
    {
        sleep(1);

        if(!$this->country_id)
        {
            $validatedData['country_id'] = '247';
        }

        if(!$this->province_id)
        {
            $validatedData['province_id'] = '4121';
        }

        if(!$this->city_id)
        {
            $validatedData['city_id'] = '48315';
        }

        if(!$this->thumbnail){
            $validatedData['thumbnail'] = $this->thumbnail->store('thumbnails');
        }else{
            $validatedData['thumbnail'] = 'thumbnails/thumbnail.png';
        }

        // if($this->tenant_contract){
        //     $validatedData['tenant_contract'] = $this->tenant_contract->store('tenant_contracts');
        // }

        // if($this->owner_contract){
        //     $validatedData['owner_contract'] = $this->owner_contract->store('owner_contracts');
        // }
        
        try{
            DB::beginTransaction();

            $validatedData = $this->validate();

            
            $this->property_details->update($validatedData);

            DB::commit();

            return redirect('/property/'.$this->property_details->uuid.'/edit')->with('success', 'Property successfully updated.');

        }catch(\Exception $e){
            DB::rollback();
            dd($e);
            return back()->with('error', 'Cannot perform your action.');
        }
    }
    
    public function render()
    {
        return view('livewire.property-edit-component',[
            'types' => Type::all(),
            'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
            'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->get(),
            'countries' => Country::orderBy('country', 'ASC')->where('id', '!=', 247)->get(),
        ]);
    }
}
