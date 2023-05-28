<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;

class EditBillComponent extends Component
{
    public Bill $bill_details;

    //input variables
    public $bill;

    public function mount($bill_details){
        $this->bill = $bill_details->bill;
    }

    public function updateBill(){
        Bill::where('id', $this->bill_details->id)
        ->update([
            'bill' => $this->bill
        ]);

        return redirect('/property/'.$this->bill_details->property_uuid.'/bill/')->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.edit-bill-component');
    }
}
