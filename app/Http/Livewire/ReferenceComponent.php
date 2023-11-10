<?php

namespace App\Http\Livewire;

use DB;
use Illuminate\Validation\Rule;
use Session;
use Str;
use Livewire\Component;
use App\Models\Reference;

class ReferenceComponent extends Component
{
    //list of passed parameters
    public $unit;
    public $tenant;

    //list of input fields
    public $reference;
    public $relationship_id;
    public $mobile_number;
    public $email;

     public function mount($unit, $tenant)
     {
        $this->unit = $unit;
        $this->tenant = $tenant;
     }

    protected function rules()
    {
        return [
            'reference' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:references'],
            'mobile_number' => 'required',
            'relationship_id' => ['required', Rule::exists('relationships', 'id')],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {


        $validatedData = $this->validate();

        try
        {
            DB::transaction(function () use ($validatedData){

                 $this->store_reference($validatedData);
            });

            return redirect('/property/'.Session::get('property_uuid').'/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.Str::random(8).'/create')->with('success', 'Changes Saved!');
        }
        catch(\Exception $e)
        {
           return back()->with('error');
        }

    }

    public function store_reference($validatedData)
    {
        $validatedData = $this->validate();

        $validatedData['tenant_uuid'] = $this->tenant->uuid;

        Reference::create($validatedData);
    }

    public function removeReference($reference_id)
    {
        app('App\Http\Controllers\ReferenceController')->destroy($reference_id);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.reference-component',[
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
            'references' => app('App\Http\Controllers\Features\TenantController')->get_tenant_references($this->tenant->uuid),
        ]);
    }
}
