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
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:tenants'],
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

        $bill_no = Property::find(Session::get('property'))->bills->max('bill_no')+1;

        $reference_no = Carbon::now()->timestamp.''.$bill_no;

        $validatedData['property_uuid'] = Session::get('property');
        $validatedData['bill_reference_no'] = $reference_no;

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
        return view('livewire.old-tenant-component',[
             'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
             'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->where('id','!=', '247')->get(),
             'countries' => Country::orderBy('country', 'ASC')->get()
        ]);
    }
}
