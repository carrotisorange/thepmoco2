<?php

namespace App\Http\Livewire;
use App\Models\Owner;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

use Livewire\Component;

class OwnerComponent extends Component
{
        use WithFileUploads;

        public $unit;
        public $countries;
        public $cities;
        public $provinces;

        public function mount($unit, $countries, $cities, $provinces)
        {
        $this->unit = $unit;
        $this->countries = $countries;
        $this->cities = $cities;
        $this->provinces = $provinces;
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
        public $photo_id;

        protected function rules()
        {
        return [
        'owner' => 'required',
        'email' => ['required', 'string', 'email', 'max:255', 'unique:tenants'],
        'mobile_number' => 'required|integer',
        'gender' => 'required',
        'civil_status' => 'required',
        'country_id' => ['required', Rule::exists('countries', 'id')],
        'province_id' => ['required', Rule::exists('provinces', 'id')],
        'city_id' => ['required', Rule::exists('cities', 'id')],
        'photo_id' => 'required|image'
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
        $validatedData['photo_id'] = $this->photo_id->store('owners');

        $tenant = Owner::create($validatedData)->uuid;

        return
        redirect('/unit/'.$this->unit->uuid.'/owner/'.$tenant.'/enrollee/'.Str::random(8).'/create')->with('success',
        'Owner has been created.');
        }

        public function render()
        {
        return view('livewire.owner-component');
        }
}
