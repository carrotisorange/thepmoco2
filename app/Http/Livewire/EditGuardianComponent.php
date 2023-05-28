<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Guardian;
use Session;

class EditGuardianComponent extends Component
{
    public Guardian $guardian_details;

    //input variables
    public $guardian;
    public $relationship_id;
    public $mobile_number;
    public $email;
    
    public function mount($guardian_details){
       $this->guardian = $guardian_details->guardian;
       $this->relationship_id = $guardian_details->relationship_id;
       $this->mobile_number = $guardian_details->mobile_number;
       $this->email = $guardian_details->email;
    }

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
    
    public function updateGuardian(){

        $validated = $this->validate();

        Guardian::where('id', $this->guardian_details->id)->update($validated);

        return redirect('/property/'.Session::get('property').'/tenant/'.$this->guardian_details->tenant_uuid)->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.edit-guardian-component',[
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
        ]);
    }
}
