<?php

namespace App\Http\Livewire;

use App\Mail\WelcomeMailToNewTenant;
use Illuminate\Support\Facades\Mail;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserProperty;
use Livewire\WithFileUploads;
use DB;
use Illuminate\Validation\Rule;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use Session;

class OldTenantComponent extends Component
{
    use WithFileUploads;

    public $unit;

    public function mount($unit)
    {
        $this->unit = $unit;
    }

    public $tenant;
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
    public $school;
    public $school_address;
    public $occupation;
    public $employer_address;
    public $employer;


    protected function rules()
    {
        return [
            'tenant' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:tenants'],
            'mobile_number' => 'nullable',
            'type' => 'nullable',
            'gender' => 'required',
            'civil_status' => 'nullable',
            'country_id' => ['nullable', Rule::exists('countries', 'id')],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'barangay' => ['nullable'],
            'photo_id' => 'nullable|image',
            'school' => 'nullable',
            'school_address' => 'nullable',
            'occupation' => 'nullable',
            'employer_address' => 'nullable',
            'employer' => 'nullable',
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
            $validatedData['photo_id'] = $this->photo_id->store('tenants');
        }else
        {
            $validatedData['photo_id'] = 'avatars/avatar.png';
        }

         if(!$this->country_id)
         {
         $validatedData['country_id'] = '18';
         }

         if(!$this->province_id)
         {
         $validatedData['province_id'] = '81';
         }

         if(!$this->city_id)
         {
         $validatedData['city_id'] = '137';
         }

        $validatedData['property_uuid'] = Session::get('property');

        // $user = User::create([
        //     'email' => $this->email,
        //     'name' => $this->tenant,
        //     'username' => Str::random(8),
        //     'mobile_number' => $this->mobile_number,
        //     'role_id' => '7',
        //     'password' => Hash::make($this->mobile_number),
        //     'avatar' => 'avatars/avatar.png',
        //     'account_owner_id' => auth()->user()->id,
        //     'status' => 'pending',
        //     'email_verified_at' => now(),
        // ]);

        // UserProperty::create([
        //   'property_uuid' => Session::get('property'),
        //   'user_id' => $user->id,
        //   'is_account_owner' => false
        // ]);

        //  $details =[
        //  'name' => $this->tenant,
        //  'email' => $this->email,
        //  'username' => $user->username
        //  ];

        //  Mail::to($this->email)->send(new WelcomeMailToNewTenant($details));

       try{
            DB::beginTransaction();
            $tenant = Tenant::create($validatedData)->uuid;
            DB::commit();
            return redirect('/unit/'.$this->unit->uuid.'/tenant/'.$tenant.'/guardian/'.Str::random(8).'/create')->with('success','Tenant has been created.');
       }catch(\Exception $e)
       {
            ddd($e);
            DB::rollback();
            return redirect()->with('error','Cannot perform your action.');
       }

       
    }

    public function render()
    {
        return view('livewire.old-tenant-component',[
             'cities' => City::orderBy('city', 'ASC')->get(),
             'provinces' => Province::orderBy('province', 'ASC')->get(),
             'countries' => Country::orderBy('country', 'ASC')->get()

            
        ]);
    }
}
