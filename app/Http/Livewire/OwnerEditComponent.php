<?php

namespace App\Http\Livewire;
use App\Models\City;
use App\Models\Province;
use App\Models\Country;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\Owner;
use App\Models\Role;

use Livewire\Component;

class OwnerEditComponent extends Component
{
        
    use WithFileUploads;

    public $owner_details;

    public $owner;
    public $email;
    public $mobile_number;
    public $status;
    public $type;
    public $birthdate;
    public $gender;
    public $civil_status;
    public $country_id;
    public $province_id;
    public $city_id;
    public $barangay;
    public $photo_id;

    public function mount($owner_details)
    {
        $this->owner = $owner_details->owner;
        $this->email = $owner_details->email;
        $this->mobile_number = $owner_details->mobile_number;
        $this->status = $owner_details->status;
        $this->birthdate = $owner_details->birthdate;
        $this->gender = $owner_details->gender;
        $this->civil_status = $owner_details->civil_status;
        $this->country_id = $owner_details->country_id;
        $this->province_id = $owner_details->province_id;
        $this->city_id = $owner_details->city_id;
        $this->barangay = $owner_details->barangay;
        $this->photo_id = $owner_details->photo_id;
    }


    protected function rules()
    {
        return 
        [
            'owner' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:tenants'],
            'mobile_number' => 'nullable',
            'gender' => 'required',
            'civil_status' => 'nullable',
            'country_id' => ['nullable', Rule::exists('countries', 'id')],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'barangay' => ['nullable'],
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

        try
        {
      

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
            
            $this->owner_details->update($validatedData);

            return redirect('/owner/'.$this->owner_details->uuid.'/edit/')->with('success','Owner is updated successfully.');
        }catch(\Exception $e)
        {  
            ddd($e);
        }

    }
    public function render()
    {
        return view('livewire.owner-edit-component',[
            'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
            'provinces' => Province::orderBy('province', 'ASC')->where('country_id',$this->country_id)->get(),
            'countries' => Country::orderBy('country', 'ASC')->get()
        ]);
    }
}
