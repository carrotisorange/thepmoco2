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
use App\Models\Property;
use Carbon\Carbon;

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
    public $course;
    public $year_level;
    public $school;
    public $school_address;
    public $occupation;
    public $employer_address;
    public $employer;


    protected function rules()
    {
        return [
            'tenant' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tenants'],
            'mobile_number' => 'nullable',
            'type' => 'required',
            'gender' => 'required',
            'civil_status' => 'nullable',
            'country_id' => ['nullable', Rule::exists('countries', 'id')],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'barangay' => ['nullable'],
            'photo_id' => 'nullable|image',
            'year_level' => 'nullable',
            'course' => 'nullable',
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
        
        $validated_data = $this->validate();

        $validated_data = $this->store_tenant($validated_data);

       try{
            DB::beginTransaction();

            $tenant = Tenant::create($validated_data)->uuid;

            $user_id = app('App\Http\Controllers\UserController')->store(
                $this->tenant, 
                app('App\Http\Controllers\UserController')->generate_temporary_username(), 
                app('App\Http\Controllers\UserController')->generate_temporary_username(),
                auth()->user()->external_id, 
                $this->email,
                8,
                $this->mobile_number,
                "none", 
                auth()->user()->checkoutoption_id,
                auth()->user()->plan_id,
            );

            User::where('id', $user_id)
            ->update([
                'tenant_uuid' => $tenant
            ]);

            //app('App\Http\Controllers\UserPropertyController')->store(Session::get('property'),$user_id,false,true);

            DB::commit();

            return redirect('/property/'.Session::get('property').'/tenant/'.$tenant.'/guardian/'.$this->unit->uuid.'/create')->with('success','Tenant is succesfully created.');

       }catch(\Exception $e)
       {
            DB::rollback();

            return back()->with('error');
       }

    }

    public function store_tenant($validated_data)
    {
        $validated_data['uuid'] = Str::uuid();

        if($this->photo_id)
        {
            $validated_data['photo_id'] = $this->photo_id->store('tenants');
        }else
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

         $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no(Session::get('property'));

        $reference_no = Carbon::now()->timestamp.''.$bill_no;

        $validated_data['property_uuid'] = Session::get('property');
        
        $validated_data['bill_reference_no'] = $reference_no;

        return $validated_data;
    }

    public function render()
    {
        return view('livewire.old-tenant-component',[
             'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
             'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->where('id','!=', '247')->get(),
             'countries' => Country::orderBy('country', 'ASC')->get()
        ]);
    }
}
