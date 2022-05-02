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

    public function mount($types, $property_details)
    {
        $this->types = $types;
        $this->property = $property_details->property;
        $this->type_id = $property_details->type_id;
        $this->thumbnai = $property_details->thumbnai;
        $this->description = $property_details->description;
        $this->tenant_contract = $property_details->tenant_contract;
        $this->owner_contract = $property_details->owner_contract;
        $this->country_id = $property_details->country_id;
        $this->province_id = $property_details->province_id;
        $this->city_id = $property_details->city_id;
        $this->barangay = $property_details->barangay;
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
    
    public function render()
    {
        return view('livewire.property-edit-component',[
            'types' => Type::all(),
        ]);
    }
}
