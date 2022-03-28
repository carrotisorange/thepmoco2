<?php

namespace App\Http\Livewire;

use App\Mail\WelcomeMailToTenant;
use Illuminate\Support\Facades\Mail;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\UserProperty;
use Livewire\WithFileUploads;
use DB;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use Session;

class TenantComponent extends Component
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
    public $barangay_id;
    public $photo_id;

    protected function rules()
    {
        return [
            'tenant' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tenants'],
            'mobile_number' => 'required',
            // 'type' => 'required',
            // 'gender' => 'required',
            // 'civil_status' => 'required',
            // 'country_id' => ['required', Rule::exists('countries', 'id')],
            // 'province_id' => ['required', Rule::exists('provinces', 'id')],
            // 'city_id' => ['required', Rule::exists('cities', 'id')],
            // 'barangay_id' => ['required', Rule::exists('barangays', 'id')],
            // 'photo_id' => 'nullable|image'
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

        $validatedData['property_uuid'] = Session::get('property');

        $user = User::create([
            'email' => $this->email,
            'name' => $this->tenant,
            'username' => Str::random(8),
            'mobile_number' => $this->mobile_number,
            'role_id' => '7',
            'password' => $this->mobile_number,
            'avatar' => 'avatars/avatar.png',
            'account_owner_id' => auth()->user()->id,
            'status' => 'pending',
            'email_verified_at' => now(),
        ]);

        UserProperty::create([
          'property_uuid' => Session::get('property'),
          'user_id' => $user->id,
          'is_account_owner' => false
        ]);

         $details =[
         'name' => $this->tenant,
         'email' => $this->email,
         'username' => $user->username
         ];

         Mail::to($this->email)->send(new WelcomeMailToTenant($details));

       try{
            DB::beginTransaction();
            $tenant = Tenant::create($validatedData)->uuid;
            DB::commit();
            return redirect('/unit/'.$this->unit->uuid.'/tenant/'.$tenant.'/guardian/'.Str::random(8).'/create')->with('success','Tenant has been created.');
       }catch(\Exception $e)
       {
            DB::rollback();
            return redirect()->with('error','Cannot perform your action.');
       }

       
    }

    public function render()
    {
        return view('livewire.tenant-component',[
            'countries' => Country::all(),
            'provinces' => Province::all(),
            'cities' => City::all(),
            'barangays' => Barangay::all()
        ]);
    }
}
