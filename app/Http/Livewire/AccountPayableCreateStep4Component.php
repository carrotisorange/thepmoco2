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

    public $property_uuid;
    
    public function mount()
    {
        $this->property_uuid = Session::get('property');
        $this->vendor = AccountPayable::find($this->accountpayable_id)->vendor;
        $this->due_date = AccountPayable::find($this->accountpayable_id)->due_date;
    }

    protected function rules()
    {
         return [
            'delivery_at' => 'required|date'
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
            'due_date' => $this->due_date
        ]);

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-5')->with('success', 'Step 4 is successfully accomplished!');
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
