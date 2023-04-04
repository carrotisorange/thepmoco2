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

        public $generateCredentials = false;

        public $hasAuthorizedRepresentative = false;

        public function mount($unit)
        {
                $this->unit = $unit;
                $this->country_id = '173';
        }

        protected function rules()
        {
                return [
                        'owner' => 'required',
                        'email' => ['nullable', 'string', 'email', 'max:255'],
                        'mobile_number' => 'nullable',
                        'gender' => 'required',
                        'civil_status' => 'nullable',
                        'employer' => 'nullable', 
                        'occupation' => 'nullable',
                        'employer_address' => 'nullable',
                        'country_id' => ['nullable', Rule::exists('countries', 'id')],
                        'province_id' => ['nullable', Rule::exists('provinces', 'id')],
                        // 'city_id' => ['nullable', Rule::exists('cities', 'id')],
                        'barangay' => ['nullable'],
                        'photo_id' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',

                        'spouse_name' => [ 'required_if:civil_status,married'],
                        'spouse_email' => ['nullable', 'string', 'email', 'max:255'],
                        'spouse_mobile_number' => ['required_if:civil_status,married'],

                        'representative_relationship_id' => ['required_if:hasAuthorizedRepresentative,true'],
                        'representative_name' => ['required_if:hasAuthorizedRepresentative,true'],
                        'representative_email' => ['nullable', 'string', 'email', 'max:255'],
                        'representative_mobile_number' => ['required_if:hasAuthorizedRepresentative,true'],
                        'representative_valid_id' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',

                ];
        }

        public function updated($propertyName)
        {
                $this->validateOnly($propertyName);
        }

        public function submitForm()
        {
                sleep(2);

                $validatedData = $this->validate();

                try{
                       
                        DB::transaction(function () use ($validatedData){
                                
                                //method to create a new owner
                                $owner_uuid = $this->store_owner($validatedData);

                                if($this->civil_status == 'married')
                                {
                                        //method to create a new spouse
                                        $this->store_spouse($this->spouse_name, $this->spouse_email, $this->spouse_mobile_number, $owner_uuid);
                                }

                                 if($this->hasAuthorizedRepresentative)
                                {
                                        //method to create a new representative
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
                                        //method to create a new user
                                        $user_id = $this->store_user();
                                        
                                        app('App\Http\Controllers\UserController')->update_user_owner_uuid($user_id, $owner_uuid);

                                }

                                //method to create a new point
                                app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id,4, 1);

                        return redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/owner/'.$owner_uuid.'/deed_of_sale/create')->with('success', 'Success!');
        
                        });
    
                }
                catch(\Exception $e)
                {                        
                        ddd($e);
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
                //$validatedData['uuid'] = Str::uuid();

                //$validatedData['property_uuid'] = Session::get('property');

                if($this->photo_id)
                {
                        // $validatedData['photo_id'] = $this->photo_id->store('owners');
                        $this->photo_id = $this->photo_id->store('owners');
                }
                else
                {
                        //$validatedData['photo_id'] = 'avatars/avatar.png';
                         $this->photo_id = 'avatars/avatar.png';
                }

                if(!$this->country_id)
                {
                        //$validatedData['country_id'] = '247';
                        $this->country_id = '247';
                }

                 if(!$this->province_id)
                {
                        //$validatedData['province_id'] = '4121';
                        $this->province_id = '4121';
                }

                if(!$this->city_id)
                {
                        $this->city_id = '48315';
                        //$validatedData['city_id'] = '48315';
                }

                //$owner_uuid = Owner::create($validatedData)->uuid;
                $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no(Session::get('property'));
                
                $owner_uuid = Owner::create([
                        'uuid' => Str::uuid(),
                        'property_uuid' => Session::get('property'),
                        'owner' => $this->owner,
                        'email' => $this->email,
                        'mobile_number' => $this->mobile_number,
                        'gender' => $this->gender,
                        'civil_status' => $this->civil_status,
                        'country_id' => $this->country_id,
                        'province_id' => $this->province_id,
                        'city_id' => $this->city_id,
                        'barangay' => $this->barangay,
                        'employer' => $this->employer, 
                        'occupation' => $this->occupation,
                        'employer_address' => $this->employer_address,
                        'photo_id' => $this->photo_id,
                        'bill_reference_no' => app('App\Http\Controllers\BillController')->generate_bill_reference_no('o',$bill_no),
                ])->uuid;

                return $owner_uuid;
        }

        public function removePhotoId()
        {
                $this->photo_id = '';
        }


        public function render()
        {
                return view('livewire.owner-component',[
                        'countries' => app('App\Http\Controllers\CountryController')->index(),
                        'provinces' => app('App\Http\Controllers\ProvinceController')->index($this->country_id),
                        'cities' => app('App\Http\Controllers\CityController')->index($this->province_id),
                        'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
                ]);
        }
}
