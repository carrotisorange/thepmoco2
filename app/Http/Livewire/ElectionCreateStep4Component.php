<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Election;

class ElectionCreateStep4Component extends Component
{
    public $election;

    public $greetings;
    public $elecom_rules;
    public $general_instructions;

    public function mount($election){
        $this->greetings = $election->greetings;
        $this->elecom_rules = $election->elecom_rules;
        $this->general_instructions = $election->general_instructions;
    }

    protected function rules()
    {
        return [
            'greetings' => 'required',
            'elecom_rules' => 'required',
            'general_instructions' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(){

        $validatedInputs = $this->validate();

        Election::where('id', $this->election->id)->update($validatedInputs);

        return redirect('/property/'.Session::get('property_uuid').'/election/'.$this->election->id.'/create/step-5')->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.election-create-step4-component');
    }
}
