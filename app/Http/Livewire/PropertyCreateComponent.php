<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use DB;
use Livewire\Component;

class PropertyCreateComponent extends Component
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
     public $registered_tin;

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
            'ownership' => ['required'],
            'registered_tin' => 'nullable'
        ];
     }

     public function updated($propertyName)
     {
        $this->validateOnly($propertyName);
     }

     public function create()
     {
         
         $validatedData = $this->validate();

         try {

            DB::transaction(function () use ($validatedData){
            
               $new_property = app('App\Http\Controllers\PropertyController')->store($validatedData);
               
               app('App\Http\Controllers\UserPropertyController')->store($new_property->uuid->toString(), auth()->user()->id, 0, 1, 5);

               app('App\Http\Controllers\UserRestrictionController')->store($new_property->uuid->toString(), auth()->user()->id);
               
               app('App\Http\Controllers\PropertyParticularController')->store($new_property->uuid->toString());

               app('App\Http\Controllers\RoleController')->store($new_property->uuid->toString());

               app('App\Http\Controllers\PointController')->store($new_property->uuid->toString(), auth()->user()->id, 50, 6);
               
               app('App\Http\Controllers\PropertyController')->store_property_session($new_property->uuid->toString());

               return redirect('/property/'.$new_property->uuid->toString().'/success')->with('success', 'Success!');
            
            }); 

        }catch (\Throwable $e) {
            return back()->with('error', $e);
        }
     }

     public function render()
     {
        return view('livewire.property-create-component',[
         'countries' => app('App\Http\Controllers\CountryController')->index(),
         'types' => app('App\Http\Controllers\TypeController')->index(),
        ]);
     }
}
