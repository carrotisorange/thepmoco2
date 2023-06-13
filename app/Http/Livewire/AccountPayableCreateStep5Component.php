<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;


class AccountPayableCreateStep5Component extends Component
{
    public $accountpayable_id;

    public $comment2;
    public $vendor;
    public $delivery_at;

    public $property_uuid;
    
    public function mount()
    {
        $this->comment2 = AccountPayable::find($this->accountpayable_id)->comment2;
        $this->property_uuid = Session::get('property');
        $this->vendor = AccountPayable::find($this->accountpayable_id)->vendor; 
        $this->delivery_at = AccountPayable::find($this->accountpayable_id)->delivery_at;
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
        

        $this->validate();

        app('App\Http\Controllers\AccountPayableController')->store_step_5($this->accountpayable_id, 'approved by ap', $this->comment2);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-6')->with('success', 'Success!');
    }

    public function rejectRequest(){
        
        

        $this->validate();

        app('App\Http\Controllers\AccountPayableController')->store_step_5($this->accountpayable_id, 'rejected by ap', $this->comment2);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-6')->with('success', 'Success!');
    }

    public function render()
    {
        $accountpayable = AccountPayable::find($this->accountpayable_id);

        return view('livewire.account-payable-create-step5-component',[
        'accountpayable' => $accountpayable,
        'particulars' => AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get()
        ]);
    }
}
