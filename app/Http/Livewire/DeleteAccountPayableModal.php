<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;

class DeleteAccountPayableModal extends Component
{
    public AccountPayable $accountpayable;

    public function deleteAccountPayable(){
    
      $batch_no = AccountPayable::find($this->accountpayable->id)->batch_no;

      AccountPayable::where('batch_no', $batch_no)->delete();

      AccountPayableParticular::where('batch_no', $batch_no)->delete();

       return redirect('/property/'.$this->accountpayable->property->uuid.'/accountpayable/')->with('success', 'Success!');   
    }

    public function render()
    {
        return view('livewire.delete-account-payable-modal');
    }
}
