<?php

namespace App\Http\Livewire;
use App\Models\Guardian;
use App\Models\Relationship;
use Illuminate\Support\Str;

use Livewire\Component;

class GuardianComponent extends Component
{
    public $unit;
    public $tenant;
    public $guardians;

    public function mount($unit, $tenant, $guardians)
    {
      $this->unit = $unit;
      $this->tenant = $tenant;
      $this->guardians = $guardians;
    }
    
    public $guardian;
    public $relationship_id;
    public $mobile_number;
    public $email;

    protected function rules()
    {
        return [
        'guardian' => 'required',
        'email' => ['required', 'string', 'email', 'max:255', 'unique:guardians'],
        'mobile_number' => 'required|integer|min:11',
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
        Guardian::create($validatedData);

        $this->resetForm();

        return redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/guardian/'.Str::random(8).'/create')->with('success',
         'Guardian has been created.');
     }

     public function resetForm()
     {
         $this->guardian='';
         $this->email='';
         $this->mobile_number='';
         $this->relationship_id='';
     }

    public function render()
    {
        return view('livewire.guardian-component',[
            'relationships' => Relationship::all()
        ]);
    }
}
