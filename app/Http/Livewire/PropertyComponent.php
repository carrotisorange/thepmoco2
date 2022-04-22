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

use Livewire\Component;

class PropertyComponent extends Component
{
     use WithFileUploads;
     
     public $types;

     public function mount($types)
     {
        $this->types = $types;
     }

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

     protected function rules()
     {
        return [
            'property' => 'required',
            'type_id' => ['required', Rule::exists('types', 'id')],
            'thumbnail' => 'nullable|image',
            'tenant_contract' => 'nullable|mimes:pdf',
            'owner_contract' => 'nullable|mimes:pdf',
            'description' => 'nullable',
             'country_id' => ['nullable', Rule::exists('countries', 'id')],
             'province_id' => ['nullable', Rule::exists('provinces', 'id')],
             'city_id' => ['nullable', Rule::exists('cities', 'id')],
             'barangay' => ['nullable'],
        ];
     }

     public function updated($propertyName)
     {
        $this->validateOnly($propertyName);
     }

     public function createForm()
     {
        sleep(1);

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


        $validatedData = $this->validate();

        try {

        $property_uuid = Str::uuid();

        $validatedData['uuid']= $property_uuid;
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

        DB::beginTransaction();

        Property::create($validatedData);

        UserProperty::create([
        'property_uuid' => $property_uuid,
        'user_id' => auth()->user()->id,
        'is_account_owner' => true
        ]);

        for($i=1; $i<=8; $i++){ 
            PropertyParticular::create([ 'property_uuid'=> $property_uuid,
            'particular_id'=> $i,
            'minimum_charge' => 0.00,
            'due_date' => 28,
            'surcharge' => 1
            ]);
        }

        for($i=1; $i<=9; $i++){ 
            PropertyRole::create(
            [ 
               'property_uuid'=> $property_uuid,
               'role_id'=> $i,
            ]);
        }

        DB::commit();
         return redirect('/properties')->with('success', 'Property has been created.');
        }catch (\Throwable $e) {
           ddd($e);
            DB::rollback();
            return back()->with('error', 'Cannot perform your action.');
        }

       
     }

     public function render()
     {
        return view('livewire.property-component',[
        'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
        'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->where('id','!=',
        '247')->get(),
        'countries' => Country::orderBy('country', 'ASC')->get()
        ]);
     }
}
