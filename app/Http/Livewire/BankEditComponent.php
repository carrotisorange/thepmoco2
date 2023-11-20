<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bank;

class BankEditComponent extends Component
{
    public $bank;

    public $bank_name;
    public $account_number;
    public $account_name;

    public function mount($bank){
        $this->bank_name = $bank->bank_name;
        $this->account_number = $bank->account_number;
        $this->account_name = $bank->account_name;
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

    public function updateBank(){

        $validatedInputs = $this->validate();

        Bank::where('id', $this->bank->id)->update($validatedInputs);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }


    public function render()
    {
        return view('livewire.subfeatures.banks.bank-edit-component');
    }
}
