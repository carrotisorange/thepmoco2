<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use App\Models\Reference;

class CreateReferenceComponent extends Component
{
    public $tenant;
    
    //input variables
    public $reference;
    public $relationship_id;
    public $mobile_number;
    public $email;

    protected function rules()
    {
        return [
            'reference' => 'required',
            'relationship_id' => ['required', Rule::exists('relationships', 'id')],
            'mobile_number' => 'required',
            'email' => ['nullable','email']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeReference(){

       $validated = $this->validate();

       $validated['tenant_uuid'] = $this->tenant->uuid;

       Reference::create($validated);

        return redirect('/property/'.$this->tenant->property_uuid.'/tenant/'.$this->tenant->uuid)->with('success', 'Success!');
    }

    public function render()
    {   
        return view('livewire.create-reference-component',[
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
        ]);
    }
}
