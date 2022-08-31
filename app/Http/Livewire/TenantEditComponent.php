<?php

namespace App\Http\Livewire;
use App\Models\Tenant;
use Livewire\Component;
use Livewire\WithFileUploads;
use DB;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class TenantEditComponent extends Component
{
    use WithPagination;

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
    public $course;
    public $year_level;
    public $school;
    public $school_address;
    public $occupation;
    public $employer_address;
    public $employer;

    public $guardian;
    public $guardian_relationship_id;
    public $guardian_mobile_number;
    public $guardian_email;

    public $reference;
    public $reference_relationship_id;
    public $reference_mobile_number;
    public $reference_email;

    public function mount($tenant_details)
    {
        $this->tenant_details = $tenant_details;
        $this->tenant = $tenant_details->tenant;
        $this->email = $tenant_details->email;
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
        $this->course = $tenant_details->course;
        $this->year_level = $tenant_details->year_level;
        $this->school = $tenant_details->school;
        $this->school_address = $tenant_details->school_address;
        $this->occupation = $tenant_details->occupation;
        $this->employer_address = $tenant_details->employer_address;
        $this->employer = $tenant_details->employer;
        $this->photo_id = $tenant_details->photo_id;
    }

    protected function rules()
    {
        return [
            'tenant' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('tenants','email')->ignore($this->tenant_details->uuid, 'uuid')],
            'mobile_number' => ['nullable'],
            'type' => 'nullable',
            'gender' => 'required',
            'civil_status' => 'nullable',
            'country_id' => ['nullable', Rule::exists('countries', 'id')],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'barangay' => 'nullable',
            'photo_id' => 'nullable',
            'course' => 'nullable',
            'year_level' => 'nullable',
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
         
        try{

            // if($this->photo_id)
            // {
            //     $validatedData['photo_id'] = $this->photo_id->store('avatars');
            // }

            DB::beginTransaction();
        
            $this->tenant_details->update($validatedData);

            DB::commit();

            session()->flash('success', 'Tenant details is successfully updated.');    
            
        }catch(\Exception $e){
            DB::rollback();

            session()->flash('error');
        }
    }

    public function render()
    {   
            return view('livewire.tenant-edit-component',[
            'cities' => app('App\Http\Controllers\CityController')->index($this->province_id),
            'provinces' => app('App\Http\Controllers\ProvinceController')->index($this->country_id),
            'countries' =>  app('App\Http\Controllers\CountryController')->index(),
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
            'references' => app('App\Http\Controllers\TenantController')->get_tenant_references($this->tenant_details->uuid),     
            'guardians' => app('App\Http\Controllers\TenantController')->show_tenant_guardians($this->tenant_details->uuid),
            'contracts' => app('App\Http\Controllers\TenantController')->show_tenant_contracts($this->tenant_details->uuid),
            'bills' => app('App\Http\Controllers\TenantController')->show_tenant_bills($this->tenant_details->uuid),
            'collections' => app('App\Http\Controllers\TenantController')->show_tenant_collections($this->tenant_details->uuid),
            'tenant' => Tenant::find($this->tenant_details->uuid),
         ]);
    }
}
