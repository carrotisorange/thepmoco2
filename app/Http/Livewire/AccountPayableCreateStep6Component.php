<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Notifications\SendAccountPayableStep3NotificationToAP;
use App\Notifications\SendAccountPayableStep4NotificationToAdmin;
use Illuminate\Support\Facades\Notification;
use App\Models\{User,UserProperty,AccountPayableLiquidationParticular,AccountPayableLiquidation,AccountPayable};

class AccountPayableCreateStep6Component extends Component
{
    public $accountpayable;

    public function get_particulars(){
        return AccountPayableLiquidationParticular::where('batch_no', $this->accountpayable->batch_no)->get();
    }

    public function approveLiquidation(){

        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
            'status' => 'liquidation approved by manager'
        ]);

         $ap = UserProperty::where('property_uuid', Session::get('property_uuid'))->where('role_id',4)->approved()->pluck('user_id')->first();


         $content = $this->accountpayable;

         if($ap){

            $email_ap = User::find($ap)->email;

            Notification::route('mail', $email_ap)->notify(new SendAccountPayableStep3NotificationToAP($content));

         }

       return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id.'/step-6')->with('success', 'Changes Saved!');
    }

    public function rejectLiquidation(){

        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
            'status' => 'released'
        ]);

        $content = $this->accountpayable;

        $requester_email = User::find($this->accountpayable->requester_id)->email;

        Notification::route('mail', $requester_email)->notify(new SendAccountPayableStep4NotificationToAdmin($content));

       return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id.'/step-6')->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.account-payable-create-step6-component',[
            'particulars' => $this->get_particulars(),
            'accountpayableliquidation' =>  AccountPayableLiquidation::where('batch_no', $this->accountpayable->batch_no)->first()
        ]);
    }
}
