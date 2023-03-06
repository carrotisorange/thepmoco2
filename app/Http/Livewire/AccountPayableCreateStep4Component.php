<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;

class AccountPayableCreateStep4Component extends Component
{
    public $accountpayable_id;

    public $delivery_at;
    public $due_date;
    public $vendor;
    public $bank;
    public $bank_name;
    public $bank_account;

    public $property_uuid;
    
    public function mount()
    {
        $this->property_uuid = Session::get('property');
        $this->vendor = AccountPayable::find($this->accountpayable_id)->vendor;
        $this->due_date = AccountPayable::find($this->accountpayable_id)->due_date;
        $this->delivery_at = AccountPayable::find($this->accountpayable_id)->delivery_at;
        $this->bank = AccountPayable::find($this->accountpayable_id)->bank;
        $this->bank_name = AccountPayable::find($this->accountpayable_id)->bank_name;
        $this->bank_account = AccountPayable::find($this->accountpayable_id)->bank_account;
    }

    protected function rules()
    {
         return [
            'delivery_at' => 'required|date',
            'bank' => 'required',
            'bank_name' => 'required',
            'bank_account' => 'required'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        sleep(1);

        $this->validate();

        AccountPayable::where('id', $this->accountpayable_id)
        ->update([
            'delivery_at' => $this->delivery_at,
            'vendor' => $this->vendor,
            'due_date' => $this->due_date,
            'bank' => $this->bank,
            'bank_name' => $this->bank_name,
            'bank_account' => $this->bank_account
        ]);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-5')->with('success', 'Success!');
    }

    public function render()
    {
        $accountpayable = AccountPayable::find($this->accountpayable_id);

        return view('livewire.account-payable-create-step4-component',[
            'accountpayable' => $accountpayable,
            'particulars' => AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get()
        ]);
    }
}
