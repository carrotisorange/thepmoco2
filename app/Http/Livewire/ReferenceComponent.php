<?php

namespace App\Http\Livewire;
use App\Models\Reference;
use App\Models\Relationship;
use DB;
use Illuminate\Validation\Rule;
use Session;
use Str;

use Livewire\Component;

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
        sleep(1);

        $validated_data = $this->validate();

        try
        {
            DB::beginTransaction();

            //store new reference
            $this->store_reference($validated_data);

            DB::commit();

        }
        catch(\Exception $e)
        {
            DB::rollback();
            
           return back()->with('error');
        }
     
    }

    public function store_reference($validated_data)
    {
        $validated_data = $this->validate();

        $validated_data['tenant_uuid'] = $this->tenant->uuid;

        Reference::create($validated_data);

        //$this->resetForm();
      
        return
        redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.Str::random(8).'/create')
        ->with('success', 'Reference is successfully created.');
    }

   
    public function removeReference($reference_id)
    {
        app('App\Http\Controllers\ReferenceController')->destroy($reference_id);

        return back()->with('success', 'Reference is successfully removed');
    }

    public function resetForm()
    {
        $this->reference='';
        $this->email='';
        $this->mobile_number='';
        $this->relationship_id='';
    }

    public function render()
    {
        return view('livewire.reference-component',[
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
            'references' => app('App\Http\Controllers\TenantController')->get_tenant_references($this->tenant->uuid),
        ]);
    }
}
