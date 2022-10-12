<?php

namespace App\Http\Livewire;

use App\Models\Tenant;
use Illuminate\Support\Str;

use Livewire\WithFileUploads;
use DB;
use Illuminate\Validation\Rule;
use Session;

use Livewire\Component;

class TenantComponent extends Component
{
    use WithFileUploads;

    public $unit;

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

    public $generateCredentials;

    public function mount($unit)
    {
        $this->unit = $unit;
        $this->generateCredentials = false;
        $this->country_id = '173';
    }

    protected function rules()
    {
        return [
            'tenant' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:tenants', 'unique:users'],
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
               
                $tenant_uuid = $this->store_tenant($validatedData);

                if($this->generateCredentials)
                {
                    $user_id = $this->store_user();

                    app('App\Http\Controllers\UserController')->update_user_tenant_uuid($user_id, $tenant_uuid);

                }

            return redirect('/property/'.Session::get('property').'/tenant/'.$tenant_uuid.'/guardian/'.$this->unit->uuid.'/create')->with('success','Tenant is succesfully created.');
      
            });
        
       }catch(\Exception $e)
       {
            return back()->with('error');
       }

    }

    public function store_user()
    {
        return app('App\Http\Controllers\UserController')->store(
            $this->tenant,
            $this->email,
            app('App\Http\Controllers\UserController')->generate_temporary_username(),
            auth()->user()->external_id,
            $this->email,
            8, //tenant
            $this->mobile_number,
            "none",
            auth()->user()->checkoutoption_id,
            auth()->user()->plan_id,
        );
    }

    public function store_tenant($validatedData)
    {
        $validatedData['uuid'] = Str::uuid();

        $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no(Session::get('property'));

        $bill_reference_no = app('App\Http\Controllers\BillController')->generate_bill_reference_no($bill_no);

        $validatedData['property_uuid'] = Session::get('property');
        
        $validatedData['bill_reference_no'] = $bill_reference_no;

        if($this->photo_id)
        {
            $validatedData['photo_id'] = $this->photo_id->store('tenants');
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

        $tenant_uuid = Tenant::create($validatedData)->uuid;

        return $tenant_uuid;
    }

    public function render()
    {
        return view('livewire.tenant-component',[
            'cities' => app('App\Http\Controllers\CityController')->index($this->province_id),
            'provinces' => app('App\Http\Controllers\ProvinceController')->index($this->country_id),
            'countries' => app('App\Http\Controllers\CountryController')->index(),
        ]);
    }
}
