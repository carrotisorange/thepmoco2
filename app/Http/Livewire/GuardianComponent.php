<?php

namespace App\Http\Livewire;
use App\Models\Guardian;
use App\Models\Relationship;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use App\Models\Tenant;

use Livewire\Component;

class GuardianComponent extends Component
{
    public $unit;
    public $tenant;
    public $guardians;
    
    public $guardian;
    public $relationship_id;
    public $mobile_number;
    public $email;

     public function mount($unit, $tenant)
     {
        $this->unit = $unit;
        $this->tenant = $tenant;
        $this->guardians = $this->get_guardians();
     }

     public function get_guardians()
     {
         return Tenant::find($this->tenant->uuid)->guardians;
     }

     public function removeGuardian($id)
     {
        Guardian::destroy($id);

        $this->guardians = $this->get_guardians();

        return back()->with('success', 'Guardian is successfully removed');
     }

    protected function rules()
    {
        return [
        'guardian' => 'required',
        'email' => ['nullable', 'string', 'email', 'max:255', 'unique:guardians'],
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

        $validated_data = $this->store_guardian($validated_data);

        try
        {
            DB::beginTransaction();
            
            Guardian::create($validated_data);

            $this->resetForm();

            $this->guardians = $this->get_guardians();

            return back()->with('success', 'Guardian is successfully created.');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            
            return back()->with('error');
        }
     
    }

    public function store_guardian($validated_data)
    {
        $validated_data = $this->validate();

        $validated_data['tenant_uuid'] = $this->tenant->uuid;
      
        return $validated_data;
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
