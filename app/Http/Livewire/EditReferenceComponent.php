<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Session;
use App\Models\Reference;

class EditReferenceComponent extends Component
{
    public Reference $reference_details;

    //input variables
    public $reference;
    public $relationship_id;
    public $mobile_number;
    public $email;

    public function mount($reference_details){
       $this->reference = $reference_details->reference;
       $this->relationship_id = $reference_details->relationship_id;
       $this->mobile_number = $reference_details->mobile_number;
       $this->email = $reference_details->email;
    }

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

    public function updateReference(){

        $validated = $this->validate();

        Reference::where('id', $this->reference_details->id)->update($validated);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.edit-reference-component',[
            'relationships' => app('App\Http\Controllers\RelationshipController')->index(),
        ]);
    }
}
