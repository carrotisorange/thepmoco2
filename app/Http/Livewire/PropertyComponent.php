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
use App\Models\UnitStats;
use Livewire\Component;
use Session;
use App\Models\User;
use Carbon\Carbon;

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
             'province_id' => ['required', Rule::exists('provinces', 'id')],
             'city_id' => ['required', Rule::exists('cities', 'id')],
             'barangay' => ['required'],
             'email' => ['required'],
             'mobile' => ['required'],
             'ownership' => ['required']
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

        $validatedData['uuid'] = $property_uuid;
        //$validatedData['status'] = 'pending';

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

         app('App\Http\Controllers\PointController')->store($property_uuid, auth()->user()->id, 50, 6);

         User::where('id', auth()->user()->id)
          ->update([
            'trial_ends_at' => Carbon::now()->addMonth(),
         ]);

        DB::commit();
         return redirect('/property/')->with('success', 'Property is successfully created.');
        }catch (\Throwable $e) {
            DB::rollback();
            return back()->with('error', 'Cannot perform your action.');
        }

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
