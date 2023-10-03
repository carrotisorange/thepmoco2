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
use Session;

class AccountPayableCreateStep4Component extends Component
{
    use WithFileUploads;

    public $accountpayable;

    public $attachment;

    public $skipLiquidation = false;
    
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
        sleep(2);

        $this->validate();

        if($this->attachment != $this->accountpayable->attachment){
            AccountPayable::where('id', $this->accountpayable->id)
            ->update([
                'attachment' => $this->attachment->store('accountpayables'),
            ]);
        }    

        if($this->skipLiquidation){
            Session::put('skipLiquidation', true);

            AccountPayable::where('id', $this->accountpayable->id)
            ->update([
                'status' => 'liquidation approved by manager',
            ]);

            return redirect('/property/'.Session::get('property_uuid').'/accountpayable/'.$this->accountpayable->id.'/step-7')->with('success', 'Changes Saved!');

         
        }else{
              AccountPayable::where('id', $this->accountpayable->id)
              ->update([
              'status' => 'released',
              ]);

            return redirect('/property/'.Session::get('property_uuid').'/accountpayable/'.$this->accountpayable->id.'/step-4')->with('success', 'Changes Saved!');
            
        }
    

    }

    public function removeAttachment(){
        $this->attachment = '';
    }

    // public function markAsReleased(){
    //     AccountPayable::where('id', $this->accountpayable->id)
    //     ->update([
    //         'status' => 'released'
    //     ]);

    //     return redirect('/property/'.Session::get('property_uuid').'/accountpayable/'.$this->accountpayable->id.'/step-4')->with('success', 'Changes Saved!');
    // }

    public function render()
    {
        return view('livewire.account-payable-create-step4-component',[
            'particulars' => AccountPayableParticular::where('batch_no', $this->accountpayable->batch_no)->get()
        ]);
    }
}
