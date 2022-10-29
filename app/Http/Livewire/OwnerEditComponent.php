<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use DB;
use App\Models\User;

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
    public $occupation;
    public $employer;
    public $employer_address;

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
        $this->employer = $owner_details->employer;
        $this->occupation = $owner_details->occupation;
        $this->employer_address = $owner_details->employer_address;
    }


    protected function rules()
    {
        return 
        [
            'owner' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('owners','email')->ignore($this->owner_details->uuid, 'uuid')],
            'mobile_number' => 'nullable',
            'gender' => 'required',
            'civil_status' => 'nullable',
            'country_id' => ['nullable', Rule::exists('countries', 'id')],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'barangay' => ['nullable'],
            'employer' => ['nullable'],
            'occupation' => ['nullable'],
            'employer_address' => ['nullable'],
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
            $this->update_owner($validatedData);
       
            session()->flash('success','Owner is successfully updated.');

        }catch(\Exception $e)
        {  
            session()->flash('error');
        }

    }

     public function sendCredentials()
    {
        sleep(2);

        // $owner = Owner::find($this->email);

        if(!$this->email){
            session()->flash('error', 'The email address is required.');
        }

        $count_user = User::where('email', $this->email)->count();

        if($count_user > 0)
        {
            session()->flash('error', 'Credentials for this owner has already been generated.');
        }

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

        User::where('id', $user_id)
          ->update([
          'owner_uuid' => $this->owner_details->uuid
        ]);

         session()->flash('succcess', 'Access to owner portal has been sent to email.');
    }

    public function removeCredentials()
    {
        sleep(2);

        User::where('email', $this->owner_details->email)
        ->delete();

        session()->flash('success', 'Access to owner portal has been removed.');
    }

    public function update_owner($validatedData)
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
    }

    public function resetPassword()
    {
        sleep(1);
        
        $new_password = app('App\Http\Controllers\UserController')->generate_temporary_username();

        $user_id = User::where('owner_uuid',$this->owner_details->uuid)->pluck('id')[0];

        $user = User::find($user_id);

        User::where('username', $user->username)
        ->update([
            'password' => Hash::make($new_password)
        ]);
       
        app('App\Http\Controllers\UserController')->send_email($user->role_id,$user->email, $user->username, $new_password);

        session()->flash('success','A new password has been sent to owners email.');
    }

    public function render()
    {
        return view('livewire.owner-edit-component',[
           'cities' => app('App\Http\Controllers\CityController')->index($this->province_id),
           'provinces' => app('App\Http\Controllers\ProvinceController')->index($this->country_id),
           'countries' => app('App\Http\Controllers\CountryController')->index(),
            'representatives' => app('App\Http\Controllers\OwnerController')->show_owner_representatives($this->owner_details->uuid),
            'banks' => app('App\Http\Controllers\OwnerController')->show_owner_banks($this->owner_details->uuid),
            'spouses' => app('App\Http\Controllers\OwnerController')->show_owner_spouses($this->owner_details->uuid),
            'deed_of_sales' => app('App\Http\Controllers\OwnerController')->show_owner_deed_of_sales($this->owner_details->uuid),
            'enrollees' => app('App\Http\Controllers\OwnerController')->show_owner_enrollees($this->owner_details->uuid),
            'credentials' => User::where('owner_uuid', $this->owner_details->uuid)->get()
        ]);
    }
}
