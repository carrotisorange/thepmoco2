<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\HouseOwner;
use App\Models\HouseOwnership;
use Session;
use DB;

class HouseOwnerCreateComponent extends Component
{
    public $house;
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

    public function mount($house)
    {
        $this->house = $house;
        $this->country_id = '173';
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

        try {
            DB::transaction(function () use ($validatedInputs){
                $validatedInputs['property_uuid'] = Session::get('property_uuid');
                $houseOwner = HouseOwner::create($validatedInputs);

                HouseOwnership::create([
                    'house_owner_id' => $houseOwner->id,
                    'house_id' => $this->house->id,
                    'property_uuid' => Session::get('property_uuid')
                ]);
            });

        }catch (\Exception $e) {
             return redirect(url()->previous())->with('error', $e);
        }

        return redirect('/property/'.Session::get('property_uuid').'/house/'.$this->house->id)->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.house-owner-create-component',[
            'countries' => app('App\Http\Controllers\CountryController')->index(),
            'provinces' => app('App\Http\Controllers\ProvinceController')->index($this->country_id),
            'cities' => app('App\Http\Controllers\CityController')->index($this->province_id),
        ]);
    }
}
