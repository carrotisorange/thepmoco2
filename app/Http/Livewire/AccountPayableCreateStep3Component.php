<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;

class AccountPayableCreateStep3Component extends Component
{
    public $accountpayable_id;

    public $comment;

    public $property_uuid;
    
    public function mount()
    {
        $this->comment = AccountPayable::find($this->accountpayable_id)->comment;
        $this->property_uuid = Session::get('property');
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

        app('App\Http\Controllers\AccountPayableController')->store_step_3($this->accountpayable_id, 'approved by admin', $this->comment);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-4')->with('success', 'Step 3 is successfully accomplished!');
    }

    public function rejectRequest(){
        
        sleep(1);

        $this->validate();

        app('App\Http\Controllers\AccountPayableController')->store_step_3($this->accountpayable_id, 'rejected by admin', $this->comment);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-3')->with('success', 'Step 3 is successfully accomplished!');
    }

    public function render()
    {
        return view('livewire.account-payable-create-step3-component',[
            'accountpayable' => AccountPayable::find($this->accountpayable_id)
        ]);
    }
}
