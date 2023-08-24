<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayableLiquidationParticular;
use App\Models\AccountPayableLiquidation;
use App\Models\AccountPayable;

class AccountPayableCreateStep7Component extends Component
{
    public $accountpayable;
    public $property;

    public function get_particulars(){
        return AccountPayableLiquidationParticular::where('batch_no', $this->accountpayable->batch_no)->get();
    }

    public function approveLiquidation(){

        AccountPayableLiquidation::where('batch_no', $this->accountpayable->batch_no)
        ->update([
            'approved_by' => auth()->user()->id,
        ]);

        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
            'status' => 'liquidation approved by manager'
        ]);

       return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-6')->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.account-payable-create-step7-component',[
            'particulars' => $this->get_particulars(),
            'accountpayableliquidation' =>  AccountPayableLiquidation::where('batch_no', $this->accountpayable->batch_no)->first()
        ]);
    }
}
