<?php

namespace App\Http\Livewire;
use App\Models\Guardian;
use App\Models\Relationship;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

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

     public function mount($unit, $tenant, $guardians)
     {
        $this->unit = $unit;
        $this->tenant = $tenant;
        $this->guardians = $guardians;
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

            return redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/guardian/'.Str::random(8).'/create')->with('success', 'Guardian is successfully created.');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            
            app('App\Http\Controllers\ErrorController')->show();
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
