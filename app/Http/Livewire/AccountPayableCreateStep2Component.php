<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;
use App\Notifications\SendAccountPayableStep3NotificationToAP;
use App\Notifications\SendAccountPayableStep4NotificationToAdmin;
use Illuminate\Support\Facades\Notification;
use App\Models\UserProperty;
use App\Models\User;

class AccountPayableCreateStep2Component extends Component
{
    public $accountpayable;

    public $comment;
    public $vendor;
    public $delivery_at;

    public function mount()
    {
        $this->comment = AccountPayable::find($this->accountpayable->id)->comment;
        $this->vendor = AccountPayable::find($this->accountpayable->id)->vendor;
        $this->delivery_at = AccountPayable::find($this->accountpayable->id)->delivery_at;
     }

    protected function rules()
    {
         return [
            'comment' => ['nullable']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function approveRequest()
    {
        $this->validate();

        app('App\Http\Controllers\RequestForPurchaseController')->update_approval($this->accountpayable->id,
        'approved by manager', $this->comment, $this->vendor);

        if($this->accountpayable->approver2_id){

            $content = $this->accountpayable;

            $second_approver = User::find($this->accountpayable->approver_id)->email;

            Notification::route('mail', $second_approver)->notify(new SendAccountPayableStep3NotificationToAP($content));
        }

        return
        redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id.'/step-2')->with('success',
        'Changes Saved!');
    }

    public function rejectRequest(){

        $this->validate();

        app('App\Http\Controllers\RequestForPurchaseController')->update_approval($this->accountpayable->id, 'rejected
        by manager', $this->comment, $this->vendor);

        $content = $this->accountpayable;

        $requester_email = User::find($this->accountpayable->requester_id)->email;

        Notification::route('mail', $requester_email)->notify(new SendAccountPayableStep4NotificationToAdmin($content));

        return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id.'/step-2')->with('success', 'Changes Saved!');
    }

    public function render()
    {
       $accountpayable = AccountPayable::find($this->accountpayable->id);

       return view('livewire.account-payable-create-step2-component',[
        'accountpayable' => $accountpayable,
        'particulars' => AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get()
       ]);
    }
}
