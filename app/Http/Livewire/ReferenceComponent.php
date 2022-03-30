<?php

namespace App\Http\Livewire;
use App\Models\Reference;
use Illuminate\Support\Str;
use App\Models\Relationship;

use Livewire\Component;

class ReferenceComponent extends Component
{
     public $unit;
     public $tenant;
     public $references;

     public function mount($unit, $tenant, $references)
     {
     $this->unit = $unit;
     $this->tenant = $tenant;
     $this->references = $references;
     }

     public $reference;
     public $relationship_id;
     public $mobile_number;
     public $email;

     protected function rules()
     {
     return [
     'reference' => 'required',
     'email' => ['required', 'string', 'email', 'max:255'],
     'mobile_number' => 'required',
     'relationship_id' => 'required',
     ];
     }

     public function updated($propertyName)
     {
     $this->validateOnly($propertyName);
     }

     public function submitForm()
     {
     sleep(1);

     $validatedData = $this->validate();

     $validatedData['tenant_uuid'] = $this->tenant->uuid;
     Reference::create($validatedData);

     $this->resetForm();

     return
     redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/reference/'.Str::random(8).'/create')->with('success',
     'Reference has been created.');
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
          'relationships' => Relationship::all(),
     ]);
     }
}
