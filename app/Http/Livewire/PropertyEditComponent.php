<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
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

class PropertyEditComponent extends Component
{
    use WithFileUploads;

    public $property_details;
    public $property;
    public $type_id;
    public $thumbnail;
    public $description;

    public $country_id;
    public $province_id;
    public $city_id;
    public $barangay;

    public $email;
    public $mobile;
    public $ownership;

    public function mount($property_details)
    {
        $this->property = $property_details->property;
        $this->type_id = $property_details->type_id;
        $this->country_id = $property_details->country_id;
        $this->province_id = $property_details->province_id;
        $this->city_id = $property_details->city_id;
        $this->barangay = $property_details->barangay;
        $this->status = $property_details->status;
        $this->email = $property_details->email;
        $this->mobile = $property_details->mobile;
        $this->ownership = $property_details->ownership;
    }

    protected function rules()
    {
        return [
           'property' => 'required',
           'type_id' => ['required', Rule::exists('types', 'id')],
           'thumbnail' => 'nullable',
           'description' => 'nullable',
           'country_id' => ['required', Rule::exists('countries', 'id')],
           'province_id' => ['required', Rule::exists('provinces', 'id')],
           'city_id' => ['required', Rule::exists('cities', 'id')],
           'barangay' => ['required'],
           'status' => ['required'],
            'email' => ['required'],
            'mobile' => ['required'],
            'ownership' => ['required']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateForm(Request $request)
    {   
        sleep(1);

        $validatedData = $this->validate();
        
        try{
            DB::beginTransaction();

            $this->update_property($validatedData, $request);

            DB::commit();

            return session()->flash('success', 'Property is successfully updated.');

        }catch(\Exception $e){
            DB::rollback();
          
            return session()->flash('error');
        }
    }

    public function update_property($validatedData, $request)
    {
         if($this->thumbnail)
         {
            $validatedData['thumbnail'] = $this->thumbnail->store('thumbnails');
         }else
         {
            $validatedData['thumbnail'] = 'thumbnails/thumbnail.png';
         }

         $this->property_details->update($validatedData);
    }
    
    public function render()
    {
        return view('livewire.property-edit-component',[
            'types' => Type::all(),
            'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
            'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->get(),
            'countries' => Country::orderBy('country', 'ASC')->where('id', '!=', 247)->get(),
        ]);
    }
}
