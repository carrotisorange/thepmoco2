<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Election;
use Session;

class ElectionEditStep1Component extends Component
{
    public $election;

    public $date_of_election;
    public $time_limit;
    public $number_of_months_behind_dues;
    public $is_proxy_voting_allowed;
    public $other_policies;

    public function mount($election){
        $this->date_of_election = $election->date_of_election;
        $this->time_limit = $election->time_limit;
        $this->number_of_months_behind_dues = $election->number_of_months_behind_dues;
        $this->is_proxy_voting_allowed = $election->is_proxy_voting_allowed;
        $this->other_policies =  $election->other_policies;
    }

    protected function rules()
    {
        return [
            'date_of_election' => 'required',
            'time_limit' => 'required',
            'number_of_months_behind_dues' => 'required',
            'is_proxy_voting_allowed' => 'required',
            'other_policies' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(){
        $validatedInputs = $this->validate();

        Election::where('id', $this->election->id)->update($validatedInputs);

        return redirect('/property/'.Session::get('property_uuid').'/election/'.$this->election->id.'/create/step-2')->with('success', 'Success!');
    }


    public function render()
    {
        return view('livewire.election-edit-step1-component');
    }
}
