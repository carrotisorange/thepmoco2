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

class PropertyEditComponent extends Component
{
    use WithFileUploads;

    public $property_details;
    public $property;
    public $type_id;
    public $thumbnail;
    public $tenant_contract;
    public $owner_contract;
    public $country_id;
    public $province_id;
    public $status;
    public $city_id;
    public $barangay;

    public function mount($property_details)
    {
        $this->property = $property_details->property;
        $this->type_id = $property_details->type_id;
        $this->thumbnai = $property_details->thumbnai;

        $this->tenant_contract = $property_details->tenant_contract;
        $this->owner_contract = $property_details->owner_contract;
        $this->country_id = $property_details->country_id;
        $this->province_id = $property_details->province_id;
        $this->city_id = $property_details->city_id;
        $this->barangay = $property_details->barangay;
        $this->status = $property_details->status;
    }

    protected function rules()
    {
        return [
            'property' => ['required', 'string', 'max:255'],
            'type_id' => ['required', Rule::exists('types', 'id')],
            'thumbnail' => 'nullable|image',
            'status' => 'required',
            'tenant_contract' => 'nullable|mimes:pdf',
            'owner_contract' => 'nullable|mimes:pdf',
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

    public function updateForm()
    {
        sleep(1);
        
        try{
            DB::beginTransaction();
            $validatedData = $this->validate();

            if($this->thumbnail)
            {
                $validatedData['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
            }

            if($this->tenant_contract)
            {
                $validatedData['tenant_contract'] = request()->file('tenant_contract')->store('tenant_contracts');
            }

            if($this->owner_contract)
            {
                $validatedData['owner_contract'] = request()->file('owner_contract')->store('owner_contracts');
            }

            $this->property_details->update($validatedData);

            DB::commit();

            return redirect('/property/'.$this->property_details->uuid.'/edit')->with('success', 'Property successfully updated.');

        }catch(\Exception $e){
            DB::rollback();
            dd($e);
            return back()->with('error', 'Cannot perform your action.');
        }
    }
    
    public function render()
    {
        return view('livewire.property-edit-component',[
            'types' => Type::all(),
            'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
            'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->get(),
            'countries' => Country::orderBy('country', 'ASC')->get(),
        ]);
    }
}
