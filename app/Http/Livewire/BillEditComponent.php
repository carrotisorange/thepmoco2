<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Bill;
use DB;

class BillEditComponent extends Component
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

     public function updatedSelectAll($value)
     {
        if($value)
        {
            $this->selectedBills = $this->get_bills()->pluck('id');
        }else
        {
            $this->selectedBills = [];
        }
        
     }

    public function removeBills()
    {
        sleep(1);

        foreach($this->selectedBills as $bill=>$val ){
            Bill::destroy($bill);
        }
        
        $this->selectedBills = [];

        $this->bills = $this->get_bills();

         session()->flash('success', count($this->selectedBills). ' bill is successfully removed.');

    }

    public function postBills()
    {
        sleep(1);

        $validatedData = $this->validate();

        try{

            Bill::where('batch_no', $this->batch_no)
            //->where('property_uuid', Session::get('property '))
            ->update([
             'is_posted' => true,
            ]);

            return redirect('/property/'.Session::get('property').'/bill/'.$this->batch_no)->with('success', count($this->bills). ' bills are successfully posted.');

            // session()->flash('success', count($this->bills). ' bills are successfully saved as draft.');

        }catch(\Exception $e){
            return back()->with('error','Cannot perform the action. Please try again.');
        }
    }

    public function updateBill($id)
    {
        sleep(1);

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
        return Bill::where('property_uuid', Session::get('property'))
        ->where('is_posted', false)
        ->where('batch_no', $this->batch_no)->get();
    }

    public function render()
    {
        return view('livewire.bill-edit-component');
    }
}
