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

class TenantEditComponent extends Component
{

    use WithFileUploads;

    public $tenant_details;
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

    public function mount($tenant_details)
    {
        $this->tenant_details = $tenant_details;
        $this->tenant = $tenant_details->tenant;
        $this->emai = $tenant_details->emai;
        $this->mobile_number = $tenant_details->mobile_number;
        $this->status = $tenant_details->status;
        $this->type = $tenant_details->type;
        $this->birthdate = $tenant_details->birthdate;
        $this->gender = $tenant_details->gender;
        $this->civil_status = $tenant_details->civil_status;
        $this->country_id = $tenant_details->country_id;
        $this->province_id = $tenant_details->province_id;
        $this->city_id = $tenant_details->city_id;
        $this->barangay = $tenant_details->barangay;
        $this->photo_id = $tenant_details->photo_id;
        $this->school = $tenant_details->school;
        $this->school_address = $tenant_details->school_address;
        $this->occupation = $tenant_details->occupation;
        $this->employer_address = $tenant_details->employer_address;
        $this->employer = $tenant_details->employer;
    }

    protected function rules()
    {
        return [
            'tenant' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('tenants',
            'email')->ignore($this->tenant_details->uuid, 'uuid')],
            'mobile_number' => ['nullable', Rule::unique('tenants',
            'mobile_number')->ignore($this->tenant_details->uuid, 'uuid')],
            'type' => 'nullable',
            'gender' => 'required',
            'civil_status' => 'nullable',
            'country_id' => ['nullable', Rule::exists('countries', 'id')],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'barangay' => ['nullable'],
              'photo_id' => 'nullable',
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

    public function updateForm()
    {
        sleep(1);

        $validatedData = $this->validate();

        try{
          DB::beginTransaction();

        if(request()->photo_id)
        {
            $validatedData['photo_id'] = $this->photo_id->store('avatars');
        }
       
        $this->tenant_details->update($validatedData);

        DB::commit();
        return back()->with('success', 'Tenant has been updated.');
        }catch(\Exception $e){
        ddd($e);
        DB::rollback();
        return back()->with('error', 'Cannot perform your action.');
        }
    }

    public function render()
    {
         return view('livewire.tenant-edit-component',[
         'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
         'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->get(),
         'countries' => Country::orderBy('country', 'ASC')->get(),
         ]);
    }
}
