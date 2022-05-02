<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;
use Carbon\Carbon;

class MoveoutContractComponent extends Component
{
    public $contract;

    public function mount($contract)
    {
        $this->contract = $contract;
        $this->moveout_at = Carbon::now()->addYear()->format('Y-m-d');
    }

    public $moveout_at;
    public $moveout_reason;

    protected function rules()
    {
         return [
            'moveout_at' => 'required',
            'moveout_reason' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        sleep(1);

        $validatedData = $this->validate();
        $validatedData['status'] = 'inactive';

        $this->contract->update($validatedData);

        return
        redirect('/tenant/'.$this->contract->tenant_uuid.'/contracts')->with('success',
        'Contract has been moveout.');
    }

    
    public function render()
    {
        return view('livewire.moveout-contract-component');
    }
}
