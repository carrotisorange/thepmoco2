<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Voter;

class ElectionCreateStep2Component extends Component
{
    public $election;

    public function exportEligibleVoters(){
      return redirect('/property/'.Session::get('property_uuid').'/election/'.$this->election->id.'/export/step-2');
    }

    public function render()
    {
        $voters = Voter::where('election_id', $this->election->id)
        ->where('number_of_past_due_account','<',$this->election->number_of_months_behind_dues)
        ->get();

        return view('livewire.election-create-step2-component',[
            'voters' => $voters
        ]);
    }
}
