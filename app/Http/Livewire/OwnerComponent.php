<?php

namespace App\Http\Livewire;
use App\Models\Owner;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Session;
use App\Models\City;
use App\Models\Province;
use App\Models\Country;

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
        public $birthdate;
        public $gender;
        public $civil_status;
        public $country_id;
        public $province_id;
        public $city_id;
        public $barangay;
        public $photo_id;

        protected function rules()
        {
                return 
                [
                        'owner' => 'required',
                        'email' => ['nullable', 'string', 'email', 'max:255', 'unique:owners'],
                        'mobile_number' => 'nullable',
                        'gender' => 'required',
                        'civil_status' => 'nullable',
                        'country_id' => ['nullable', Rule::exists('countries', 'id')],
                        'province_id' => ['nullable', Rule::exists('provinces', 'id')],
                        'city_id' => ['nullable', Rule::exists('cities', 'id')],
                        'barangay' => ['nullable'],
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
                $validatedData['property_uuid'] = Session::get('property');

                if($this->photo_id)
                {
                        $validatedData['photo_id'] = $this->photo_id->store('owners');
                }else
                {
                        $validatedData['photo_id'] = 'avatars/avatar.png';
                }

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

                $owner = Owner::create($validatedData)->uuid;

                return
                redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/owner/'.$owner.'/deed_of_sale/'.Str::random(8).'/create')->with('success',
                'Owner is created successfully.');
        }

        public function render()
        {
                return view('livewire.owner-component',[
                                'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
                                'provinces' => Province::orderBy('province', 'ASC')->where('country_id',$this->country_id)->get(),
                                'countries' => Country::orderBy('country', 'ASC')->get()
                ]);
        }
}
