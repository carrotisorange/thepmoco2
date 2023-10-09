<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use Livewire\Component;
use App\Models\Bill;
use App\Models\Collection;

class DeleteBillComponent extends Component
{
    public Bill $bill;

    //input variables
    public $description;

    protected function rules()
    {
        return [
            'description' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function deleteBill(){

        $this->validate();

        Bill::where('id', $this->bill->id)
        ->update([
            'description' => $this->description
        ]);

        Bill::where('id', $this->bill->id)
        ->delete();

        Collection::where('bill_id', $this->bill->id)->delete();


        return redirect(url()->previous())->with('success', 'Changes Saved!');

    }

    public function render()
    {
        return view('livewire.delete-bill-component');
    }
}
