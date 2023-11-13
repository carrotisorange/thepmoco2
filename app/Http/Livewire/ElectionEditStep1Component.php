<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Session;
use App\Models\{Bill,Election,Voter,Carbon};

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

        $houseOwners = Bill::select('*',DB::raw('datediff(CURRENT_DATE,start)/30 as delayed_dues_in_months'))
        ->where('property_uuid', Session::get('property_uuid'))->where('status','unpaid')
        ->get();

        Election::where('id', $this->election->id)->update($validatedInputs);

           foreach($houseOwners as $houseOwner){
                    Voter::updateOrCreate(
                        [
                            'house_owner_id' => $houseOwner->house_owner_id,
                            'election_id' => $this->election->id,
                        ],
                        [
                            'house_owner_id' => $houseOwner->house_owner_id,
                            'election_id' => $this->election->id,
                            'number_of_years_as_hoa_member' => ($houseOwner->houseOwner->created_at)->diffInYears(Carbon::now()),
                            'number_of_past_due_account' => $houseOwner->delayed_dues_in_months,

                        ]
                    );
                }

        return redirect('/property/'.Session::get('property_uuid').'/election/'.$this->election->id.'/create/step-2')->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.election-edit-step1-component');
    }
}
