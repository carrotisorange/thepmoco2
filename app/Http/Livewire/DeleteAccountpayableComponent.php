<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{AccountPayable,AccountPayableParticular};

class DeleteAccountpayableComponent extends Component
{
    public AccountPayable $accountpayable;

    public function submitButton(){

      $batch_no = AccountPayable::find($this->accountpayable->id)->batch_no;

      AccountPayable::where('batch_no', $batch_no)->delete();

      AccountPayableParticular::where('batch_no', $batch_no)->delete();

       return redirect('/property/'.$this->accountpayable->property->uuid.'/rfp/')->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.delete-accountpayable-component');
    }
}
