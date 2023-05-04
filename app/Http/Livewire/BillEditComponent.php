<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;

class BillEditComponent extends Component
{
    public $property;

    public $bill;

    public $start;
    public $end;
    public $bill_amount;
    public $particular_id;

    public function mount($bill){
        $this->start = $bill->start;
        $this->end = $bill->end;
        $this->bill_amount = $bill->bill;
        $this->particular_id = $bill->particular_id;
    }

    protected function rules()
    {
        return [
            'start' => ['required','date'],
            'end' => ['required', 'date'],
            'bill_amount' => ['required'],
            'particular_id' => ['required']            
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }

    public function updateBill(){

        sleep(2);
        
        $this->validate();

        Bill::where('id', $this->bill->id)
        ->update([
            'start' => $this->start,
            'end' => $this->end,
            'bill' => $this->bill_amount,
            'particular_id' => $this->particular_id
        ]);

        return redirect('/property/'.$this->property->uuid.'/guest/'.$this->bill->guest_uuid)->with('success', 'Success');
    }
    
    public function render()
    {
        return view('livewire.bill-edit-component',[
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($this->property->uuid)
        ]);
    }
}
