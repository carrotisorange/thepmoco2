<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use App\Models\Guardian;

class CreateGuardianComponent extends Component
{
    public $tenant;
    
    //input variables
    public $guardian;
    public $relationship_id;
    public $mobile_number;
    public $email;

    protected function rules()
    {
        return [
            'guardian' => 'required',
            'relationship_id' => ['required', Rule::exists('relationships', 'id')],
            'mobile_number' => 'required',
            'email' => ['nullable','email']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitButton(){

       $validated = $this->validate();

       $validated['tenant_uuid'] = $this->tenant->uuid;

       Guardian::create($validated);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {   
        return view('livewire.create-guardian-component',[
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
        ]);
    }
}
