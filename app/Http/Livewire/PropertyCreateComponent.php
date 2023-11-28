<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use DB;
use Session;

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

               $new_property = app('App\Http\Controllers\PropertyController')->store($validatedData, $this->type_id);

               Session::put('property_uuid',$new_property->uuid->toString());

               app('App\Http\Controllers\Utilities\UserPropertyController')->store($new_property->uuid->toString(), auth()->user()->id, 0, 1, 5);

               app('App\Http\Controllers\Utilities\UserRestrictionController')->storeOrUpdateFeatureRestrictions($new_property->uuid->toString());

               app('App\Http\Controllers\Utilities\PropertyParticularController')->store($new_property->uuid->toString());

               app('App\Http\Controllers\Utilities\RoleController')->store($new_property->uuid->toString());

               app('App\Http\Controllers\Utilities\PointController')->store(50, 6);

               app('App\Http\Controllers\PropertyController')->storePropertySession($new_property->uuid->toString());

               return redirect('/property/'.$new_property->uuid->toString().'/success')->with('success', 'Changes Saved!');

            });

        }catch (\Exception $e) {
            return redirect(url()->previous())->with('error', $e);
        }
     }

     public function render()
     {
        return view('livewire.property-create-component',[
         'countries' => app('App\Http\Controllers\Utilities\CountryController')->index(),
         'types' => app('App\Http\Controllers\Utilities\TypeController')->index(),
        ]);
     }
}
