<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use Carbon\Carbon;
use Http\Livewire\URL;

class EditBillComponent extends Component
{
    public Bill $bill_details;

    //input variables
    public $bill;
    public $start;
    public $end;

    public function mount($bill_details){
        $this->bill = $bill_details->bill;
        $this->start = Carbon::parse($bill_details->start)->format('Y-m-d');
        $this->end = Carbon::parse($bill_details->end)->format('Y-m-d');
    }

    public function updateBill(){
        Bill::where('id', $this->bill_details->id)
        ->update([
            'bill' => $this->bill,
            'start' => $this->start,
            'end' => $this->end
        ]);

    return redirect(url()->previous());

        // return back()->with('success', 'Success!');
    }
    
    public function render()
    {
        return view('livewire.edit-bill-component');
    }
}
