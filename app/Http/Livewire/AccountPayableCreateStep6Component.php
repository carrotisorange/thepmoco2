<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayableLiquidationParticular;
use App\Models\AccountPayableLiquidation;
use App\Models\AccountPayable;
use App\Notifications\SendAccountPayableStep3NotificationToAP;
use App\Notifications\SendAccountPayableStep4NotificationToAdmin;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\UserProperty;


class AccountPayableCreateStep6Component extends Component
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

         $ap = UserProperty::where('property_uuid', $this->property->uuid)->where('role_id',
         4)->pluck('user_id')->first();


         $content = $this->accountpayable;

         if($ap){

            $email_ap = User::find($ap)->email;

            Notification::route('mail', $email_ap)->notify(new SendAccountPayableStep3NotificationToAP($content));

         }

       return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-6')->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.account-payable-create-step6-component',[
            'particulars' => $this->get_particulars(),
            'accountpayableliquidation' =>  AccountPayableLiquidation::where('batch_no', $this->accountpayable->batch_no)->first()
        ]);
    }
}
