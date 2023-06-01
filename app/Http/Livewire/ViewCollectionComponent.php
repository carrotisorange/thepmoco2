<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewCollectionComponent extends Component
{
    public $collection;

    //input variables
    public $mode_of_payment;
    public $cheque_no;
    public $date_deposited;
    public $bank;
    public $amount;

    public function mount($collection){
        $this->mode_of_payment = $collection->mode_of_payment;
        $this->cheque_no = $collection->cheque_no;
        $this->date_deposited = $collection->date_deposited;
        $this->bank = $collection->bank;
        $this->amount = $collection->amount;
    }

    public function render()
    {
        return view('livewire.view-collection-component');
    }
}
