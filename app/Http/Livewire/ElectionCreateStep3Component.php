<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Voter;

class ElectionCreateStep3Component extends Component
{
    public $election;

    public function exportCandidates(){
      return redirect('/property/'.Session::get('property_uuid').'/election/'.$this->election->id.'/export/step-3');
    }

    public function render()
    {
        $candidates = Voter::where('election_id', $this->election->id)
        // ->where('is_candidate',1)
        ->get();

        return view('livewire.election-create-step3-component',[
            'candidates' => $candidates
        ]);
    }
}
