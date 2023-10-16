<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use Carbon\Carbon;
use Session;
use Http\Livewire\URL;

class EditBillComponent extends Component
{
    public $bill_details;

    //input variables
    public $bill;
    public $start;
    public $end;
    public $particular_id;

    public function mount($bill_details){
        $this->bill = $bill_details->bill;
        $this->start = Carbon::parse($bill_details->start)->format('Y-m-d');
        $this->end = Carbon::parse($bill_details->end)->format('Y-m-d');
        $this->particular_id = $bill_details->particular_id;
    }

    public function updateBill(){

        $this->validate([
            'bill' => 'required | gt:0'
        ]);

        Bill::where('id', $this->bill_details->id)
        ->update([
            'bill' => $this->bill,
            'start' => $this->start,
            'end' => $this->end,
            'particular_id' => $this->particular_id
        ]);

        return redirect(url()->previous())->with('success', 'Changes Saved!');

        // return back()->with('success', 'Changes Saved!');
    }
    
    public function render()
    {
        return view('livewire.edit-bill-component',[
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property_uuid')),
        ]);
    }
}
