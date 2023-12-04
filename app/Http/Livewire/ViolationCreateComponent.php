<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Models\{Unit, Violation, Contract, ViolationType, DeedOfSale};

class ViolationCreateComponent extends Component
{
    use WithFileUploads;

    public $violation;
    public $type_id;
    public $unit_uuid;
    public $tenant_uuid;
    public $owner_uuid;
    public $image;
    public $details;

    protected function rules()
    {
        return [
            'violation' => 'required',
            'type_id' => ['required', Rule::exists('violation_types', 'id')],
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'tenant_uuid' => ['nullable', Rule::exists('tenants', 'uuid')],
             'owner_uuid' => ['nullable', Rule::exists('owners', 'uuid')],
            'details' => 'required',
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
        $validatedInputs['image'] = $this->image->store('violations');
        $validatedInputs['user_id'] = auth()->user()->id;

        $violation = Violation::create($validatedInputs);

        return redirect('/property/'.Session::get('property_uuid').'/violation/')->with('success', 'Changes Saved!');
    }


    public function render()
    {
        $types = ViolationType::all();
        $units = Unit::where('property_uuid', Session::get('property_uuid'))->get();
        $tenants = Contract::where('property_uuid',Session::get('property_uuid'))
        ->when($this->unit_uuid, function($query){
        $query->where('unit_uuid', $this->unit_uuid);
        })->groupBy('tenant_uuid')->get();

        $owners = DeedOfSale::where('property_uuid',Session::get('property_uuid'))
        ->when($this->unit_uuid, function($query){
        $query->where('unit_uuid', $this->unit_uuid);
        })->groupBy('owner_uuid')->get();

        return view('livewire.violation-create-component',compact(
            'types','units','tenants','owners'
        ));
    }
}
