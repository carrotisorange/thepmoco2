<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{AccountPayableLiquidationParticular,AccountPayableLiquidation};

class CreateAccountPayableLiquidationStep2Component extends Component
{
    public $accountpayable;

    public function get_particulars(){
        return AccountPayableLiquidationParticular::where('batch_no', $this->accountpayable->batch_no)->get();
    }

    public function approveLiquidation(){

        AccountPayableLiquidation::where('batch_no', $this->accountpayable->batch_no)
        ->update([
            'approved_by' => auth()->user()->id
        ]);

       return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.create-account-payable-liquidation-step2-component',[
            'particulars' => $this->get_particulars(),
            'accountpayableliquidation' =>  AccountPayableLiquidation::where('batch_no', $this->accountpayable->batch_no)->first()
        ]);
    }
}
