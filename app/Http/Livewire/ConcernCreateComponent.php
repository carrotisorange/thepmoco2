<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Models\{ConcernCategory, Unit, Concern, Contract};

class ConcernCreateComponent extends Component
{
    use WithFileUploads;

    public $subject;
    public $category_id;
    public $unit_uuid;
    public $tenant_uuid;
    public $concern;
    public $image;

    protected function rules()
    {
        return [
            'subject' => 'required',
            'category_id' => ['required', Rule::exists('concern_categories', 'id')],
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'tenant_uuid' => ['nullable', Rule::exists('tenants', 'uuid')],
            'concern' => 'required',
            'image' => 'required | mimes:jpg,bmp,png,pdf,docx|max:10240',
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit(){
        $validatedInputs = $this->validate();

        $validatedInputs['property_uuid'] = Session::get('property_uuid');
        $validatedInputs['image'] = $this->image->store('concerns');

        $concern = Concern::create($validatedInputs);

        return redirect('/property/'.Session::get('property_uuid').'/concern/'.$concern->id.'/edit')->with('success', 'Changes Saved!');
    }


    public function render()
    {
        $categories = ConcernCategory::all();
        $units = Unit::where('property_uuid', Session::get('property_uuid'))->get();
        $tenants = Contract::where('property_uuid',Session::get('property_uuid'))
        ->when($this->unit_uuid, function($query){
        $query->where('unit_uuid', $this->unit_uuid);
        })->groupBy('tenant_uuid')->get();

        return view('livewire.concern-create-component',compact(
            'categories','units','tenants'
        ));
    }
}
