<?php

namespace App\Http\Livewire;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use DB;
use Illuminate\Validation\Rule;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use Session;
use Carbon\Carbon;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tenants', 'unique:users'],
            'mobile_number' => 'nullable',
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

        //validate inputs
        $validated_data = $this->validate();

       try{
            DB::beginTransaction();

            //store new tenant
            $tenant_uuid = $this->store_tenant($validated_data);

            //store a new user
            $user_id = app('App\Http\Controllers\UserController')->store(
                $this->tenant, 
                app('App\Http\Controllers\UserController')->generate_temporary_username(), 
                app('App\Http\Controllers\UserController')->generate_temporary_username(),
                auth()->user()->external_id, 
                $this->email,
                8, //tenant 
                $this->mobile_number,
                "none", 
                auth()->user()->checkoutoption_id,
                auth()->user()->plan_id,
            );

            //update tenant_uuid of the newly created tenant
            app('App\Http\Controllers\UserController')->update_tenant_uuid($user_id, $tenant_uuid);

            return redirect('/property/'.Session::get('property').'/tenant/'.$tenant_uuid.'/guardian/'.$this->unit->uuid.'/create')->with('success','Tenant is succesfully created.');
           
            DB::commit();

       }catch(\Exception $e)
       {
            DB::rollback();

            ddd($e);

            return back()->with('error');
       }

    }

    public function store_tenant($validated_data)
    {
        $validated_data['uuid'] = Str::uuid();

        $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no(Session::get('property'));

        $bill_reference_no = app('App\Http\Controllers\BillController')->generate_bill_reference_no($bill_no);

        $validated_data['property_uuid'] = Session::get('property');
        
        $validated_data['bill_reference_no'] = $bill_reference_no;

        if($this->photo_id)
        {
            $validated_data['photo_id'] = $this->photo_id->store('tenants');
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

        $tenant_uuid = Tenant::create($validated_data)->uuid;

        return $tenant_uuid;
    }

    public function render()
    {
        return view('livewire.tenant-component',[
             'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
             'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->where('id','!=', '247')->get(),
             'countries' => Country::orderBy('country', 'ASC')->get()
        ]);
    }
}
