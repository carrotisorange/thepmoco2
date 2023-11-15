<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bank;

class BankCreateComponent extends Component
{
    public $owner;
    public $bank_name;
    public $account_name;
    public $account_number;

    public function mount($owner){
        $this->account_name = $owner->owner;
    }

    protected function rules()
    {
        return [
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeBank(){
        $validatedInputs = $this->validate();

        $validatedInputs['owner_uuid'] = $this->owner->uuid;

        Bank::create($validatedInputs);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.subfeatures.banks.bank-create-component');
    }
}
