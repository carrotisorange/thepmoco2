<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\{AcknowledgementReceipt,User,Representative,Owner,Bill,DeedOfSale,Spouse,Collection,Feature, Violation};

class OwnerShowComponent extends Component
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
    public $bill_reference_no;

    public $view = 'listView';

    public $isPaymentAllowed = false;

    public $isIndividualView = true;

    public $owner_uuid;

    public $user_type = 'owner';

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
        $this->bill_reference_no = $owner_details->bill_reference_no;
        $this->owner_uuid = $owner_details->uuid;

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
            'bill_reference_no' => ['nullable']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {


        $validatedData = $this->validate();

        try
        {
            $this->update_owner($validatedData);

            return redirect(url()->previous())->with('success', 'Changes Saved!');

        }catch(\Exception $e)
        {
           return redirect(url()->previous())->with('error', $e);
        }

    }

    public function sendCredentials()
    {

        if($this->email == null){
            return redirect(url()->previous())->with('error', 'Email address is missing.');
        }

        $count_user = User::where('email', $this->owner_details->email)->count();

        if($count_user > 0)
        {
            return redirect(url()->previous())->with('error', 'Access already exists!');
        }

        $temporary_password =  app('App\Http\Controllers\Auth\UserController')->generate_temporary_username();

        $user_id = User::updateOrCreate(
            [
                'email' => $this->email
            ],
            [
                'name' => $this->owner,
                'mobile_number' => $this->mobile_number,
                'email' => $this->email,
                'role_id' => 7,
                'username' => $this->email,
                'password' => Hash::make($temporary_password),
                'external_id' => auth()->user()->external_id,
                'checkoutoption_id' => auth()->user()->checkoutoption_id,
                'plan_id' => auth()->user()->plan_id,
                'discount_code' => "none",
                'trial_ends_at' => Carbon::now()->addMonth(),
                'created_at' => Carbon::now(),
                'email_verified_at' => Carbon::now()
            ]
        );

        User::where('id', $user_id->id)
          ->update([
          'owner_uuid' => $this->owner_details->uuid
        ]);

        if($user_id->role_id == '5')
        {
            User::where('id', $user_id)
            ->update([
                'password' => null,
                'account_owner_id' => $user_id,
            ]);
        }else{
            app('App\Http\Controllers\Auth\UserController')->send_email($user_id->role_id, $user_id->email, $user_id->username, $temporary_password);
        }

        $featureId = 8;

        $restrictionId = 3;

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($restrictionId ,$featureId);


        return redirect('/property/'.Session::get('property_uuid').'/owner/'.$this->owner_details->uuid)->with('success', 'Changes Saved!');
    }

    public function removeCredentials()
    {
        User::where('email', $this->owner_details->email)
        ->delete();

        $featureId = 8;

        $restrictionId = 4;

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($restrictionId, $featureId);

        session()->flash('success', 'Changes Saved!');
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


        $new_password = app('App\Http\Controllers\Auth\UserController')->generate_temporary_username();

        $user_id = User::where('owner_uuid',$this->owner_details->uuid)->pluck('id')[0];

        $user = User::find($user_id);

        User::where('username', $user->username)
        ->update([
            'password' => Hash::make($new_password)
        ]);

        app('App\Http\Controllers\Auth\UserController')->send_email($user->role_id,$user->email, $user->username, $new_password);

        session()->flash('success','Changes Saved!');
    }

      public function removeRepresentative($id)
        {
                Representative::destroy($id);

               return redirect(url()->previous())->with('success', 'Changes Saved!');
        }

    public function deleteOwner(){

        DeedOfSale::where('owner_uuid', $this->owner_details->uuid)->delete();
        Spouse::where('owner_uuid', $this->owner_details->uuid)->delete();
        Representative::where('owner_uuid', $this->owner_details->uuid)->delete();
        Bill::where('owner_uuid', $this->owner_details->uuid)->delete();
        Collection::where('owner_uuid', $this->owner_details->uuid)->delete();
        AcknowledgementReceipt::where('owner_uuid', $this->owner_details->uuid)->delete();
        Owner::where('uuid', $this->owner_details->uuid)->delete();
        User::where('owner_uuid', $this->owner_details->uuid)->delete();

        return redirect('/property/'.$this->owner_details->property_uuid.'/owner/')->with('success', 'Changes Saved!');

    }

    public function render()
    {
        $featureId = 8;

        $ownerSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $ownerSubfeaturesArray = explode(",", $ownerSubfeatures);

        return view('livewire.features.owner.owner-show-component',[
           'cities' => app('App\Http\Controllers\Utilities\CityController')->index($this->province_id),
           'provinces' => app('App\Http\Controllers\Utilities\ProvinceController')->index($this->country_id),
           'countries' => app('App\Http\Controllers\Utilities\CountryController')->index(),
            'representatives' => app('App\Http\Controllers\Features\OwnerController')->show_owner_representatives($this->owner_details->uuid),
            'banks' => app('App\Http\Controllers\Features\OwnerController')->show_owner_banks($this->owner_details->uuid),
            'spouses' => app('App\Http\Controllers\Features\OwnerController')->show_owner_spouses($this->owner_details->uuid),
            'deed_of_sales' => app('App\Http\Controllers\Features\OwnerController')->show_owner_deed_of_sales($this->owner_details->uuid),
            'credentials' => User::where('owner_uuid', $this->owner_details->uuid)->get(),
            'bills' => Bill::where('owner_uuid', $this->owner_details->uuid)->posted()->get(),
            'collections' => app('App\Http\Controllers\OwnerCollectionController')->get_owner_collections(Session::get('property_uuid'), $this->owner_details->uuid),
            'username' => User::where('email', $this->owner_details->email)->value('username'),
            'email_cred' => User::where('email', $this->owner_details->email)->value('email'),
            'spouse' => Spouse::where('owner_uuid', $this->owner_details->uuid)->get(),
            'ownerSubfeaturesArray' => $ownerSubfeaturesArray,
            'sessions' => DB::table('sessions')->where('user_id', User::where('owner_uuid', $this->owner_details->uuid)->value('id'))->orderBy('created_at', 'desc')->limit(5)->get(),
            'violations' => Violation::where('owner_uuid', $this->owner_details->uuid)->get()
        ]);
    }
}
