<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayable;
use Livewire\WithFileUploads;
use App\Models\AccountPayableParticular;
use App\Notifications\SendAccountPayableStep4NotificationToAdmin;
use Illuminate\Support\Facades\Notification;
use App\Models\UserProperty;
use App\Models\User;

class AccountPayableCreateStep4Component extends Component
{
    use WithFileUploads;

    public $property;

    public $accountpayable;

    public $attachment;
    
    public function mount($accountpayable)
    {
        $this->attachment = $accountpayable->attachment;
    }

    protected function rules()
    {
         return [
             'attachment' => 'required |max:10240',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {

        $this->validate();

        if($this->attachment != $this->accountpayable->attachment){
            AccountPayable::where('id', $this->accountpayable->id)
            ->update([
                'attachment' => $this->attachment->store('accountpayables'),
                'status' => 'released'
                
            ]);
            
        }    

        $requester = UserProperty::where('property_uuid', $this->property->uuid)->where('role_id', 9)->pluck('user_id')->first();

        $content = $this->accountpayable;

        if($requester){
            $requester_email = User::find($requester)->email;

            Notification::route('mail', $requester_email)->notify(new SendAccountPayableStep4NotificationToAdmin($content));
    
        }
        
        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-5')->with('success', 'Success!');

    }

    public function removeAttachment(){
        $this->attachment = '';
    }

    public function markAsReleased(){
        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
            'status' => 'released'
        ]);

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-5')->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.account-payable-create-step4-component',[
            'particulars' => AccountPayableParticular::where('batch_no', $this->accountpayable->batch_no)->get()
        ]);
    }
}
