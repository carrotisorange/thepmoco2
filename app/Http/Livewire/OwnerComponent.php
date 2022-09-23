<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Session;
use DB;

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
                return [
                        'owner' => 'required',
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
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

                $validated_data = $this->validate();

                try{

                        DB::beginTransaction();

                        $owner_uuid = $this->store_owner($validated_data);

                        $user_id = app('App\Http\Controllers\UserController')->store(
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

                        //update owner_uuid of the newly created owner
                        app('App\Http\Controllers\UserController')->update_user_owner_uuid($user_id, $owner_uuid);

                        DB::commit();

                        return redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/owner/'.$owner_uuid.'/deed_of_sale/'.Str::random(8).'/create')->with('success', 'Owner is created successfully.');
                }
                catch(\Exception $e)
                {
                        DB::rollback();

                        return back()->with('error');
                }
        }

        public function store_owner($validated_data)
        {
                $validated_data['uuid'] = Str::uuid();

                $validated_data['property_uuid'] = Session::get('property');

                if($this->photo_id)
                {
                        $validated_data['photo_id'] = $this->photo_id->store('owners');
                }
                else
                {
                        $validated_data['photo_id'] = 'avatars/avatar.png';
                }

                if(!$this->country_id)
                {
                $validated_data['country_id'] = '247';
                }

                 if(!$this->province_id)
                {
                 $validated_data['province_id'] = '4121';
                }

                if(!$this->city_id)
                {
                  $validated_data['city_id'] = '48315';
                }

                $owner_uuid = Owner::create($validated_data)->uuid;

                return $owner_uuid;

        }

        public function render()
        {
                return view('livewire.owner-component',[
                        'cities' => app('App\Http\Controllers\CityController')->index($this->province_id),
                        'provinces' => app('App\Http\Controllers\ProvinceController')->index($this->country_id),
                        'countries' => app('App\Http\Controllers\CountryController')->index(),
                ]);
        }
}
