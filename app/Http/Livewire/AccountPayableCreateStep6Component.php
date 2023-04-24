<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayable;
use Livewire\WithFileUploads;
use App\Models\AccountPayableParticular;

class AccountPayableCreateStep6Component extends Component
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
        sleep(2);

        $this->validate();

        if($this->attachment != $this->accountpayable->attachment){
            AccountPayable::where('id', $this->accountpayable->id)
            ->update([
                'attachment' => $this->attachment->store('accountpayables'),
                'status' => 'released'
                
            ]);
            
        }    
        
        return redirect('/property/'.$this->property->uuid.'/accountpayable/')->with('success', 'Success!');

        //  return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/liquidation/step-1')->with('success', 'Success!');
    }

    public function removeAttachment(){
        $this->attachment = '';
    }

    public function render()
    {
        return view('livewire.account-payable-create-step6-component',[
            'particulars' => AccountPayableParticular::where('batch_no', $this->accountpayable->batch_no)->get()
        ]);
    }
}
