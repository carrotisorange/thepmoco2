<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use App\Models\HouseOwner;

use Livewire\Component;

class HouseOwnerEditComponent extends Component
{
    public $house_owner_details;

    public $house_owner;
    public $email;
    public $mobile_number;
    public $birthdate;
    public $gender;
    public $civil_status;
    public $photo_id;
    public $occupation;
    public $employer;
    public $employer_address;
    public $country_id;
    public $province_id;
    public $address;

    public function mount($house_owner_details)
    {
        $this->house_owner = $house_owner_details->house_owner;
        $this->email = $house_owner_details->email;
        $this->mobile_number = $house_owner_details->mobile_number;
        $this->birthdate = $house_owner_details->birthdate;
        $this->birthdate = $house_owner_details->birthdate;
        $this->gender = $house_owner_details->gender;
        $this->civil_status = $house_owner_details->civil_status;
        $this->photo_id = $house_owner_details->photo_id;
        $this->occupation = $house_owner_details->occupation;
        $this->employer = $house_owner_details->employer;
        $this->employer_address = $house_owner_details->employer_address;
        $this->country_id = $house_owner_details->country_id;
        $this->province_id = $house_owner_details->province_id;
        $this->address = $house_owner_details->address;
    }

    protected function rules()
        {
            return [
                'house_owner' => 'required',
                'email' => ['nullable', 'string', 'email', 'max:255'],
                'mobile_number' => 'nullable',
                'gender' => 'required',
                'civil_status' => 'required',
                'employer' => 'nullable',
                'occupation' => 'nullable',
                'employer_address' => 'nullable',
                'country_id' => ['nullable', Rule::exists('countries', 'id')],
                'province_id' => ['required', Rule::exists('provinces', 'id')],
                'address' => ['nullable'],
                'photo_id' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(){
        $validatedInputs = $this->validate();

        $houseOwner = HouseOwner::where('id', $this->house_owner_details->id)->update($validatedInputs);

       return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.house-owner-edit-component',[
            'countries' => app('App\Http\Controllers\CountryController')->index(),
            'provinces' => app('App\Http\Controllers\ProvinceController')->index($this->country_id),
            'cities' => app('App\Http\Controllers\CityController')->index($this->province_id),
        ]);
    }
}
