<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayableParticular;
use App\Models\AccountPayable;

class AccountPayableShowComponent extends Component
{
    public $property;
    public $accountpayable;

    public $status;

    public function mount(){
        $this->status = $this->accountpayable->status;
    }

    public function changeAccountPayableStatus(){
        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
            'status' => $this->status
        ]);

        return back()->with('success', 'Success');
    }

    public function render()
    {
        return view('livewire.account-payable-show-component',[
             'particulars' => AccountPayableParticular::where('batch_no', $this->accountpayable->batch_no)->get()
        ]);
    }
}
