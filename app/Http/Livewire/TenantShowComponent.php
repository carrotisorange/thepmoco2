<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use DB;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use App\Models\User;
use Session;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Guardian;

class TenantShowComponent extends Component
{
    use WithPagination;

    use WithFileUploads;

    public $property;
    public $tenant_details;
    
    public $tenant;
    public $email;
    public $mobile_number;
    public $status;
    public $type;
    public $birthdate;
    public $gender;
    public $civil_status;
    public $bill_reference_no;
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
    public $category;

    public $view = 'listView';

    public $isPaymentAllowed = false;
    

    public function mount($tenant_details)
    {
        $this->bill_reference_no = $tenant_details->bill_reference_no;
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
        $this->category = $tenant_details->category;
    }

    protected function rules()
    {
        return [
            'tenant' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('tenants','email')->ignore($this->tenant_details->uuid, 'uuid')],
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
            'status' => 'required',
            'category' => 'required',
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        
       
        $validatedData = $this->validate();
         
        try{
            DB::transaction(function () use ($validatedData){
                $this->tenant_details->update($validatedData);

                app('App\Http\Controllers\ActivityController')->store($this->property->uuid, auth()->user()->id,'updates',3);

                session()->flash('success', 'Success!');
            });
            
        }catch(\Exception $e){
            session()->flash('error', $e);
        }
    }

    public function redirectToTheCreateGuardianPage(){
        

        return redirect('/property/'. $this->property->uuid.'/tenant/'.$this->tenant_details->uuid.'/guardian/'.Str::random(8).'/create');
    }

    public function redirectToTheCreateReferencePage(){
        

        return redirect('/property/'. $this->property->uuid.'/tenant/'.$this->tenant_details->uuid.'/reference/'.Str::random(8).'/create');
    }

    public function redirectToTheCreateConcernPage(){
        

        return redirect('/property/'. $this->property->uuid.'/tenant/'.$this->tenant_details->uuid.'/concern/create');
    }

    public function redirectToTheCreateBillPage(){
        

        return redirect('/property/'. $this->property->uuid.'/tenant/'.$this->tenant_details->uuid.'/bills');
    }

    public function redirectToTheCreateContractPage(){
        

        return redirect('/property/'. $this->property->uuid.'/tenant/'.$this->tenant_details->uuid.'/units');
    }

    public function sendCredentials()
    {
        

        if(!$this->email){
            session()->flash('error', 'The email address is required.');
        }

        $count_user = User::where('email', $this->tenant_details->email)->count();

        if($count_user > 0)
        {
             session()->flash('error', 'Credentials for this tenant has already been generated.');
        }

        $temporary_password =  app('App\Http\Controllers\UserController')->generate_temporary_username();

        $user_id = User::updateOrCreate(
            [
                'email' => $this->email
            ],
            [
                'name' => $this->tenant,
                'mobile_number' => $this->mobile_number,
                'email' => $this->email,
                'role_id' => 8,
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
          'tenant_uuid' => $this->tenant_details->uuid
        ]);

        if($user_id->role_id == '5')
        {
            User::where('id', $user_id)
            ->update([
                'password' => null,
                'account_owner_id' => $user_id,
            ]);
        }else{
            app('App\Http\Controllers\UserController')->send_email($user_id->role_id, $user_id->email, $user_id->username, $temporary_password);
        }

        app('App\Http\Controllers\ActivityController')->store($this->property->uuid, auth()->user()->id,'sends',18);
       

       return back()->with('success', 'Success');
    }

    public function removeCredentials()
    {
        sleep(1);

        User::where('email', $this->tenant_details->email)
        ->delete();
        
        app('App\Http\Controllers\ActivityController')->store($this->property->uuid, auth()->user()->id,'removes', 18);

        session()->flash('success', 'Success!');
    }

    public function deleteTenant(){

        app('App\Http\Controllers\PropertyContractController')->destroy(null, $this->tenant_details->uuid);
        app('App\Http\Controllers\TenantGuardianController')->destroy($this->tenant_details->uuid);
        app('App\Http\Controllers\TenantReferenceController')->destroy($this->tenant_details->uuid);
        app('App\Http\Controllers\TenantConcernController')->destroy($this->tenant_details->uuid);
        app('App\Http\Controllers\TenantConcernController')->destroy($this->tenant_details->uuid);
        app('App\Http\Controllers\TenantBillController')->destroy($this->tenant_details->uuid);
        app('App\Http\Controllers\TenantCollectionController')->destroy_collection_from_tenant_page($this->tenant_details->uuid);
        app('App\Http\Controllers\PropertyTenantController')->destroy($this->tenant_details->uuid);
        User::where('tenant_uuid', $this->tenant_details->uuid)->delete();


      return redirect('/property/'.$this->tenant_details->property_uuid.'/tenant/')->with('success', 'Success!');
 
    }

    public function render()
    {   
            return view('livewire.tenant-show-component',[
            'cities' => app('App\Http\Controllers\CityController')->index($this->province_id),
            'provinces' => app('App\Http\Controllers\ProvinceController')->index($this->country_id),
            'countries' =>  app('App\Http\Controllers\CountryController')->index(),
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
            'references' => app('App\Http\Controllers\TenantController')->get_tenant_references($this->tenant_details->uuid),     
            'guardians' => app('App\Http\Controllers\TenantController')->show_tenant_guardians($this->tenant_details->uuid),
            'contracts' => app('App\Http\Controllers\TenantController')->show_tenant_contracts($this->tenant_details->uuid),
            'bills' => app('App\Http\Controllers\TenantController')->show_tenant_bills($this->tenant_details->uuid),
            'concerns' => app('App\Http\Controllers\TenantController')->show_tenant_concerns($this->tenant_details->uuid),
            'collections' => app('App\Http\Controllers\TenantCollectionController')->get_tenant_collections($this->property->uuid, $this->tenant_details->uuid),
            'wallets' => Wallet::where('tenant_uuid', $this->tenant_details->uuid)->orderBy('id','desc')->get(),
            'username' => User::where('tenant_uuid', $this->tenant_details->uuid)->value('username'),
         ]);
    }
}
