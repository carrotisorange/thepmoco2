<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use DB;
use App\Models\Property;
use App\Models\UserProperty;
use App\Models\PropertyParticular;
use App\Models\PropertyRole;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use App\Models\Type;
use Livewire\Component;

class PropertyComponent extends Component
{
     use WithFileUploads;

     public $property;
     public $type_id;
     public $thumbnail;
     public $description;
     public $tenant_contract;
     public $owner_contract;
     public $country_id;
     public $province_id;
     public $city_id;
     public $barangay;
     public $email;
     public $mobile;
     public $ownership;

     public function mount(){
        $this->mobile = auth()->user()->mobile_number;
        $this->email = auth()->user()->email;
        $this->country_id = 173;
     }

     protected function rules()
     {
        return [
            'property' => 'required',
            'type_id' => ['required', Rule::exists('types', 'id')],
            'thumbnail' => 'nullable|image',
            'tenant_contract' => 'nullable|mimes:pdf',
            'owner_contract' => 'nullable|mimes:pdf',
            'description' => 'nullable',
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'city_id' => ['nullable', Rule::exists('cities', 'id')],
            'barangay' => ['required'],
            'email' => ['nullable'],
            'mobile' => ['nullable'],
            'ownership' => ['required']
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

         try {

         $property_uuid = Str::uuid();

         DB::transaction(function () use ($validatedData, $property_uuid){
            
            $property = $this->store_property($property_uuid, $validatedData);

            $this->store_user_property($property_uuid);

            $this->store_particulars($property_uuid);

            $this->store_roles($property_uuid);

            app('App\Http\Controllers\PointController')->store($property_uuid, auth()->user()->id, 50, 6);
            
            app('App\Http\Controllers\PropertyController')->store_property_session($property);
          
         });
         
         return redirect('/property/'.$property_uuid.'/success')->with('success', 'Property is successfully created.');
         
        }catch (\Throwable $e) {
            return back()->with('error', 'Cannot perform your action.');
        }
     }

     public function store_roles($property_uuid)
     {
        for($i=1; $i<=9; $i++){ 
         PropertyRole::create([ 'property_uuid'=> $property_uuid,
            'role_id'=> $i,
            ]);
         }
     }

      public function store_particulars($property_uuid){
         for($i=1; $i<=8; $i++){ 
            PropertyParticular::create([ 'property_uuid'=> $property_uuid,
            'particular_id'=> $i,
            'minimum_charge' => 0.00,
            'due_date' => 28,
            'surcharge' => 1
           ]);
      }
     }

     public function store_user_property($property_uuid)
     {
       return UserProperty::create([
       'property_uuid' => $property_uuid,
       'user_id' => auth()->user()->id,
       'is_account_owner' => true
       ]);
     }

     public function store_property($property_uuid, $validatedData)
     {
         $validatedData['uuid'] = $property_uuid;
         $validatedData['mobile'] = auth()->user()->mobile;
         $validatedData['email'] = auth()->user()->email;

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

         if($this->thumbnail){
             $validatedData['thumbnail'] = $this->thumbnail->store('thumbnails');
         }else{
             $validatedData['thumbnail'] = 'thumbnails/thumbnail.png';
         }

         if($this->tenant_contract){
            $validatedData['tenant_contract'] = $this->tenant_contract->store('tenant_contracts');
         }

         if($this->owner_contract){
            $validatedData['owner_contract'] = $this->owner_contract->store('owner_contracts');
         }

        return Property::create($validatedData);
     }
     public function render()
     {
        return view('livewire.property-component',[
         'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
         'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->get(),
          'countries' => Country::orderBy('country', 'ASC')->where('id', '!=', 247)->get(),
         'types' => Type::orderBy('type')->get(),
        ]);
     }
}
