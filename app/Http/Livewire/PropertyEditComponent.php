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

class PropertyEditComponent extends Component
{
    use WithFileUploads;

    public $types;
    public $property_details;

    public function mount($types, $property_details)
    {
        $this->types = $types;
        $this->property_details = $property_details;
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
        return view('livewire.property-edit-component');
    }
}
