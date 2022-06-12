<?php

namespace App\Http\Livewire;
use App\Models\Reference;
use Illuminate\Support\Str;
use App\Models\Relationship;
use DB;
use App\Models\Tenant;

use Livewire\Component;

class ReferenceComponent extends Component
{
    public $unit;
    public $tenant;
    public $references;
    
    public $reference;
    public $relationship_id;
    public $mobile_number;
    public $email;

     public function mount($unit, $tenant)
     {
        $this->unit = $unit;
        $this->tenant = $tenant;
        $this->guardians = $this->get_references();
     }

     public function get_references()
     {
         return Tenant::find($this->tenant->uuid)->guardians;
     }

     public function removeReference($id)
     {
        Reference::destroy($id);

        $this->references = $this->get_references();

        return back()->with('success', 'Reference is successfully removed');
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

        $validated_data = $this->store_reference($validated_data);

        try
        {
            DB::beginTransaction();
            
            Guardian::create($validated_data);

            $this->resetForm();

            $this->guardians = $this->get_references();

            return back()->with('success', 'Reference is successfully created.');
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
      
        return $validated_data;
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
            'relationships' => Relationship::all()
        ]);
    }
}
