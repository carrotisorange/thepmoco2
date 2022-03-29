<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;
use Carbon\Carbon;

class MoveoutComponent extends Component
{
    public $contract;

    public function mount($contract)
    {
        $contract = $contract;
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
        redirect('/contract/'.$this->contract->uuid.'/moveout/bill')->with('success',
        'Contract has been terminated.');
    }

    
    public function render()
    {
        return view('livewire.moveout-component');
    }
}
