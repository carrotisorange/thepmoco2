<?php

namespace App\Http\Livewire;
use App\Models\Owner;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

use App\Models\City;
use App\Models\Province;
use App\Models\Country;
use App\Models\Barangay;

use Livewire\Component;

class OwnerComponent extends Component
{
        use WithFileUploads;

        public $unit;

        public function mount($unit)
        {
                $this->unit = $unit;
        }

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
        public $barangay_id;
        public $photo_id;

        protected function rules()
        {
                return [
                        'owner' => 'required',
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
                        'mobile_number' => 'required|integer',
                        'gender' => 'required',
                        'civil_status' => 'required',
                        'country_id' => ['required', Rule::exists('countries', 'id')],
                        'province_id' => ['required', Rule::exists('provinces', 'id')],
                        'city_id' => ['required', Rule::exists('cities', 'id')],
                        'barangay_id' => ['required'],
                        'photo_id' => 'nullable|image'
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

                $validatedData['uuid'] = Str::uuid();

                if($this->photo_id)
                {
                        $validatedData['photo_id'] = $this->photo_id->store('owners');
                }else
                {
                        $validatedData['photo_id'] = 'avatars/avatar.png';
                }

                $owner = Owner::create($validatedData)->uuid;

                return
                redirect('/unit/'.$this->unit->uuid.'/owner/'.$owner.'/sale/'.Str::random(8).'/create')->with('success',
                'Owner has been created.');
        }

        public function render()
        {
                $cities = City::all();
                $provinces = Province::all();
                $countries = Country::all();
                $barangays = Barangay::all();

                return view('livewire.owner-component',[
                        'cities' => $cities,
                        'provinces' => $provinces,
                        'countries' => $countries,
                        'barangays' => $barangays,
                ]);
        }
}
