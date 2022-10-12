<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Session;
use DB;
use App\Models\Spouse;
use App\Models\Relationship;
use App\Models\Representative;
use Livewire\Component;

class OwnerComponent extends Component
{
        use WithFileUploads;

        public $unit;

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
        public $employer;
        public $occupation;
        public $employer_address;

        public $spouse_name;
        public $spouse_email;
        public $spouse_mobile_number;

        public $representative_name;
        public $representative_mobile_number;
        public $representative_email;
        public $representative_relationship_id;
        public $representative_valid_id;

        public $generateCredentials;

        public $hasAuthorizedRepresentative;

        public function mount($unit)
        {
                $this->unit = $unit;
                $this->generateCredentials = false;
                $this->country_id = '173';
                $this->hasAuthorizedRepresentative = false;
        }

        protected function rules()
        {
                return [
                        'owner' => 'required',
                        'email' => ['nullable', 'string', 'email', 'max:255', 'unique:owners', 'unique:users'],
                        'mobile_number' => 'nullable',
                        'gender' => 'required',
                        'civil_status' => 'nullable',
                        'country_id' => ['nullable', Rule::exists('countries', 'id')],
                        'province_id' => ['nullable', Rule::exists('provinces', 'id')],
                        'city_id' => ['nullable', Rule::exists('cities', 'id')],
                        'barangay' => ['nullable'],
                        'photo_id' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:1024',
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

                try{
                        DB::transaction(function () use ($validatedData){
                
                                $owner_uuid = $this->store_owner($validatedData);

                                if($this->civil_status == 'married')
                                {
                                        $this->store_spouse($this->spouse_name, $this->spouse_email, $this->spouse_mobile_number, $owner_uuid);
                                }

                                 if($this->hasAuthorizedRepresentative)
                                {
                                        $representative_id = app('App\Http\Controllers\RepresentativeController')->store(
                                                $this->representative_name, $this->representative_email, $this->representative_mobile_number, $this->representative_relationship_id, $owner_uuid
                                        );

                                        if($this->representative_valid_id)
                                        {
                                                Representative::where('id', $representative_id)
                                                ->update([
                                                        'valid_id' => $this->representative_valid_id->store('representatives')
                                                ]);
                                        }
                                }
                        
                                if($this->generateCredentials)
                                {
                                        $user_id = $this->store_user();

                                        app('App\Http\Controllers\UserController')->update_user_owner_uuid($user_id, $owner_uuid);

                                }

                        return redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/owner/'.$owner_uuid.'/deed_of_sale/create')->with('success', 'Owner is created successfully.');
        
                        });
    
                }
                catch(\Exception $e)
                {               
                        ddd($e);
                        return back()->with('error');
                }
        }

        public function store_user()
        {
                return app('App\Http\Controllers\UserController')->store(
                        $this->owner,
                        $this->email,
                        app('App\Http\Controllers\UserController')->generate_temporary_username(),
                        auth()->user()->external_id,
                        $this->email,
                        7, //owner
                        $this->mobile_number,
                        "none",
                        auth()->user()->checkoutoption_id,
                        auth()->user()->plan_id,
        );
        }

        public function store_spouse($name, $email, $mobile_number, $owner_uuid)
        {
                Spouse::create([
                        'spouse' => $name,
                        'email' => $email,
                        'mobile_number' => $mobile_number,
                        'owner_uuid' => $owner_uuid
                ]);
        }

        public function store_owner($validatedData)
        {
                $validatedData['uuid'] = Str::uuid();

                $validatedData['property_uuid'] = Session::get('property');

                if($this->photo_id)
                {
                        $validatedData['photo_id'] = $this->photo_id->store('owners');
                }
                else
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

                $owner_uuid = Owner::create($validatedData)->uuid;

                return $owner_uuid;
        }

        public function render()
        {
                return view('livewire.owner-component',[
                        'cities' => app('App\Http\Controllers\CityController')->index($this->province_id),
                        'provinces' => app('App\Http\Controllers\ProvinceController')->index($this->country_id),
                        'countries' => app('App\Http\Controllers\CountryController')->index(),
                        'relationships' => Relationship::all(),
                ]);
        }
}
