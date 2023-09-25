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

class AccountPayableCreateStep3Component extends Component
{
    public $property;
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

    public function downloadInternalDocument(){
        

        return
        redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step1/export');

    }

    public function approveRequest()
    {
        $this->validate();

        app('App\Http\Controllers\RequestForPurchaseController')->update_approval($this->accountpayable->id, 'approved by ap', $this->comment, $this->vendor);

        $ap = UserProperty::where('property_uuid', $this->property->uuid)->where('role_id', 4)->approved()->pluck('user_id')->first();


        $content = $this->accountpayable;

        if($ap){

            $email_ap = User::find($ap)->email;
            
            Notification::route('mail', $email_ap)->notify(new SendAccountPayableStep3NotificationToAP($content));

        }

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-4')->with('success', 'Success!');
    }

    public function rejectRequest(){

        $this->validate();

        app('App\Http\Controllers\RequestForPurchaseController')->update_approval($this->accountpayable->id, 'rejected
        by ap', $this->comment, $this->vendor);

        $content = $this->accountpayable;

        $requester_email = User::find($this->accountpayable->requester_id)->email;

        Notification::route('mail', $requester_email)->notify(new SendAccountPayableStep4NotificationToAdmin($content));

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-3')->with('success', 'Success!');
    }

    

    public function render()
    {
       $accountpayable = AccountPayable::find($this->accountpayable->id);

       return view('livewire.account-payable-create-step3-component',[
       'accountpayable' => $accountpayable,
       'particulars' => AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get()
       ]);
    }
}
