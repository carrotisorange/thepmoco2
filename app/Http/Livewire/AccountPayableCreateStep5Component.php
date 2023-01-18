<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;

class AccountPayableCreateStep5Component extends Component
{
    public $accountpayable_id;

    public $comment2;

    public $property_uuid;
    
    public function mount()
    {
        $this->comment2 = AccountPayable::find($this->accountpayable_id)->comment2;
        $this->property_uuid = Session::get('property');
    }

    protected function rules()
    {
         return [
            'comment2' => ['nullable']
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

        app('App\Http\Controllers\AccountPayableController')->store_step_5($this->accountpayable_id, 'approved by manager', $this->comment2);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-6')->with('success', 'Step 5 is successfully accomplished!');
    }

    public function rejectRequest(){
        
        sleep(1);

        $this->validate();

        app('App\Http\Controllers\AccountPayableController')->store_step_5($this->accountpayable_id, 'rejected by manager', $this->comment2);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-6')->with('success', 'Step 5 is successfully accomplished!');
    }

    public function render()
    {
        return view('livewire.account-payable-create-step5-component',[
            'accountpayable' => AccountPayable::find($this->accountpayable_id)
        ]);
    }
}
