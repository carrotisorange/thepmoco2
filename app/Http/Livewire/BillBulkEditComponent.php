<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Bill;

class BillBulkEditComponent extends Component
{
    public $batch_no;
    public $bills;
    public $selectedBills = [];
    public $selectAll = false;

    public function mount()
    {
        $this->bills = $this->get_bills();
    }

    protected function rules()
    {
        return [
            'bills.*.start' => 'required',
            'bills.*.end' => 'required',
            'bills.*.bill' => 'required',
            'bills.*.is_posted' => 'required'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function postBills()
    {
        $validatedData = $this->validate();

        try{

            Bill::where('property_uuid', Session::get('property_uuid'))
            ->where('is_posted', false)
            ->where('batch_no', $this->batch_no)
            ->update([
                'is_posted' => true,
            ]);

            return redirect('/property/'.Session::get('property_uuid').'/bill/')->with('success', 'Changes Saved!');

        }catch(\Exception $e){

           return redirect(url()->previous())->with('error', $e->getMessage());
        }
    }

    public function updateBill($id)
    {
        $validatedData = $this->validate();

        try{
                foreach ($this->bills->where('id', $id) as $bill) {

                     Bill::where('id', $id)
                     ->update([
                        'start' => $bill->start,
                        'end' =>  $bill->end,
                        'bill' => $bill->bill,
                     ]);

                  $this->bills = $this->get_bills();
                }

           session()->flash('success', 'Saved');

        }catch(\Exception $e){
            return back()->with('error','Cannot perform the action. Please try again.');
        }
    }

    public function get_bills()
    {
        return Bill::where('property_uuid', Session::get('property_uuid'))
        ->where('batch_no', $this->batch_no)
        ->where('is_posted', false)
        ->get();
    }

    public function render()
    {
        return view('livewire.bill-bulk-edit-component');
    }
}
