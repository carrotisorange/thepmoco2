<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Session;
use App\Models\Guardian;

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
            'relationship_id' => ['required', Rule::exists('relationships', 'id')],
            'guardian' => [ 'required'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'mobile_number' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {


        //validate inputs
        $validated_data = $this->validate();

        try
        {
            //store new guardian
           $this->store_guardian($validated_data);
        }
        catch(\Exception $e)
        {
            return back()->with('error');
        }
    }


    public function store_guardian($validated_data)
    {
        $validated_data['tenant_uuid'] = $this->tenant->uuid;

        Guardian::create($validated_data);

        return redirect('/property/'.Session::get('property_uuid').'/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/reference/'.Str::random(8).'/create')
        ->with('success', 'Changes Saved!');

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


        return app('App\Http\Controllers\Subfeatures\GuardianController')->destroy($guardian_id);

    }

    public function render()
    {
        return view('livewire.guardian-component',[
            'relationships' => app('App\Http\Controllers\Utilities\RelationshipController')->index(),
            'guardians' => app('App\Http\Controllers\Features\TenantController')->show_tenant_guardians($this->tenant->uuid)
        ]);
    }
}
