<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use DB;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use App\Models\Type;
use App\Models\PropertyDocument;
use Session;

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
    public $status;

    public $email;
    public $mobile;
    public $ownership;
    public $facebook_page;
    public $telephone;
    public $note_to_bill;
    public $note_to_transient;

    public $title;
    public $business_permit;
    public $registered_tin;




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
        $this->facebook_page = $property_details->facebook_page;
        $this->telephone = $property_details->telephone;
        $this->note_to_bill = $property_details->note_to_bill;
        $this->note_to_transient = $property_details->note_to_transient;
        $this->registered_tin = $property_details->registered_tin;

    }

    protected function rules()
    {
        return [
            'property' => 'required',
            'type_id' => ['required', Rule::exists('types', 'id')],
            'thumbnail' => 'nullable | mimes:jpg,png, max:102400',
            'description' => 'nullable',
            'country_id' => ['required', Rule::exists('countries', 'id')],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'city_id' => ['required', Rule::exists('cities', 'id')],
            'barangay' => ['required'],
            'status' => ['required'],
            'email' => ['nullable'],
            'mobile' => ['nullable'],
            'ownership' => ['required'],
            'status' => ['required'],
            'facebook_page' => 'nullable',
            'telephone' => 'nullable',
            'note_to_bill' => 'nullable',
            'note_to_transient' => 'nullable',
            'registered_tin' => 'nullable',

        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(Request $request)
    {

        $validated = $this->validate();

        try{
            DB::transaction(function () use ($validated, $request){
              $this->update_property($validated, $request);
            });

            $featureId = 20;

            $restrictionId = 3;

            app('App\Http\Controllers\ActivityController')->store($this->property_details->uuid, auth()->user()->id,$restrictionId,$featureId);

            return session()->flash('success', 'Changes Saved!');

        }catch(\Exception $e){
            ddd($e);
            return session()->flash('error', 'Something went wrong.');
        }
    }

    public function update_property($validated, $request)
    {
        if ($this->thumbnail === null) {
            $thumbnail = $this->property_details->thumbnail;
        }else{
            $thumbnail = $this->thumbnail->store('thumbnails');
        }

        $validated['thumbnail'] = $thumbnail;

        $this->property_details->update($validated);
    }

    public function render()
    {
        $propertyDocuments = PropertyDocument::where('property_uuid', $this->property_details->uuid)->get();

        return view('livewire.property-edit-component',[
            'types' => Type::all(),
            'cities' => City::orderBy('city', 'ASC')->where('province_id', $this->province_id)->get(),
            'provinces' => Province::orderBy('province', 'ASC')->where('country_id', $this->country_id)->get(),
            'countries' => Country::orderBy('country', 'ASC')->where('id', '!=', 247)->get(),
            'propertyDocuments' => $propertyDocuments
        ]);
    }
}
