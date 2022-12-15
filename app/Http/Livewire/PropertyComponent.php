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

         $new_property = app('App\Http\Controllers\PropertyController')->store($validatedData);

         try {

         DB::transaction(function () use ($validatedData, $new_property){

            app('App\Http\Controllers\UserPropertyController')->store($new_property->uuid->toString(), auth()->user()->id, 0, 1);

            // $this->store_user_property($new_property->uuid->toString());

            $this->store_particulars($new_property->uuid->toString());

            $this->store_roles($new_property->uuid->toString());

            app('App\Http\Controllers\PointController')->store($new_property->uuid->toString(), auth()->user()->id, 50, 6);
            
            app('App\Http\Controllers\PropertyController')->store_property_session($new_property->uuid->toString());

            return redirect('/property/'.$new_property->uuid->toString().'/success')->with('success', 'Property is successfully created.');
          
         });
         
        }catch (\Throwable $e) {
            ddd($e);
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
