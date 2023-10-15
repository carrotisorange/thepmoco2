<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Voter;

class ElectionCreateStep2Component extends Component
{
    public $election;

    public function render()
    {
        $voters = Voter::where('election_id', $this->election->id)->get();

        return view('livewire.election-create-step2-component',[
            'voters' => $voters
        ]);
    }
}
