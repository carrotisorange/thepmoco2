<?php

namespace App\Http\Livewire;
use App\Models\Guardian;
use Illuminate\Validation\Rule;
use DB;

use Livewire\Component;

class GuardianComponent extends Component
{
    //list of passed parameters
    public $unit;
    public $tenant;
    
    //list of input fields
    public $guardian;
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

        //validate inputs
        $validated_data = $this->validate();

        try
        {
            DB::beginTransaction();

            //store new guardian
           $this->store_guardian($validated_data);

            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            
            return back()->with('error');
        }
    }


    public function store_guardian($validated_data)
    {
        $validated_data['tenant_uuid'] = $this->tenant->uuid;

        Guardian::create($validated_data);

        //retrieve updated list of guardians

        return back()->with('success', 'Guardian is successfully created.');

    }

    public function resetForm()
    {
        $this->guardian='';
        $this->email='';
        $this->mobile_number='';
        $this->relationship_id='';
    }

    public function removeGuardian($guardian_id)
    {
        sleep(1);

        return app('App\Http\Controllers\GuardianController')->destroy($guardian_id);

    }

    public function render()
    {
        return view('livewire.guardian-component',[
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
            'guardians' => app('App\Http\Controllers\TenantController')->show_tenant_guardians($this->tenant->uuid)
        ]);
    }
}
