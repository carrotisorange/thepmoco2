<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;

class AccountPayableCreateStep3Component extends Component
{
    public $accountpayable_id;

    public $comment;
    public $vendor;

    public $property_uuid;
    
    public function mount()
    {
        $this->comment = AccountPayable::find($this->accountpayable_id)->comment;
        $this->property_uuid = Session::get('property');
        $this->vendor = AccountPayable::find($this->accountpayable_id)->vendor; 
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
        sleep(1);

        $this->validate();

        app('App\Http\Controllers\AccountPayableController')->store_step_3($this->accountpayable_id, 'approved by manager', $this->comment, $this->vendor);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-4')->with('success', 'Success!');
    }

    public function rejectRequest(){
        
        sleep(1);

        $this->validate();

        app('App\Http\Controllers\AccountPayableController')->store_step_3($this->accountpayable_id, 'rejected by manager', $this->comment, $this->vendor);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-3')->with('success', 'Success!');
    }

    public function render()
    {
       $accountpayable = AccountPayable::find($this->accountpayable_id);

       return view('livewire.account-payable-create-step3-component',[
       'accountpayable' => $accountpayable,
       'particulars' => AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get()
       ]);
    }
}
