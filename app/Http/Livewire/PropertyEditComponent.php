<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use DB;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use App\Models\Type;
use App\Models\PropertyDocument;

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

    public $doc1;
    public $doc2;
    public $doc3;
    public $doc4;
    public $doc5;
    public $doc6;
    public $doc7;


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

    public function submitForm()
    {
        try{
            DB::transaction(function (){
                $this->property_details->update($this->validate());
            });

            $featureId = 20;

            $restrictionId = 3;

            app('App\Http\Controllers\ActivityController')->store($this->property_details->uuid, auth()->user()->id,$restrictionId,$featureId);

         return redirect(url()->previous())->with('success', 'Changes Saved!');

        }catch(\Exception $e){
           return redirect(url()->previous())->with('error', $e);
        }
    }

    public function update_property($validated)
    {
        if ($this->thumbnail === null) {
            $thumbnail = $this->property_details->thumbnail;
        }else{
            $thumbnail = $this->thumbnail->store('thumbnails');
        }

        if ($this->doc1 === null) {
            $doc1 = $this->property_details->doc1;
        }else{
            $doc1 = $this->doc1->store('doc1');
        }

        if ($this->doc2 === null) {
            $doc2 = $this->property_details->doc2;
        }else{
            $doc2 = $this->doc2->store('doc2');
        }

        if ($this->doc3 === null) {
            $doc3 = $this->property_details->doc3;
        }else{
            $doc3 = $this->doc3->store('doc3');
        }

        if ($this->doc4 === null) {
            $doc4 = $this->property_details->doc4;
        }else{
            $doc4 = $this->doc4->store('doc4');
        }

        if ($this->doc5 === null) {
            $doc5 = $this->property_details->doc5;
        }else{
            $doc5 = $this->doc4->store('doc5');
        }

        if ($this->doc6 === null) {
            $doc6 = $this->property_details->doc6;
        }else{
            $doc6 = $this->doc6->store('doc6');
        }

        if ($this->doc7 === null) {
            $doc7 = $this->property_details->doc7;
        }else{
            $doc7 = $this->doc7->store('doc7');
        }


        $validated['thumbnail'] = $thumbnail;
        $validated['doc1'] = $doc1;
        $validated['doc2'] = $doc2;
        $validated['doc3'] = $doc3;
        $validated['doc4'] = $doc4;
        $validated['doc5'] = $doc5;
        $validated['doc6'] = $doc6;
        $validated['doc7'] = $doc7;

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
