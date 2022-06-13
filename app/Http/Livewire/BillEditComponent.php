<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
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
            'bills.*.bill' => 'required'
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
        foreach($this->selectedBills as $bill=>$val ){
            Bill::destroy($bill);
        }
        
        $this->bills = $this->get_bills();

         session()->flash('success', count($this->selectedBills). ' bill is successfully removed.');

    }

    public function submitForm()
    {
        sleep(1);

        try{
            DB::beginTransaction();

            foreach ($this->bills as $bill) {
                $bill->save();
            }

            DB::commit();

            session()->flash('success', count($this->selectedBills). ' bill is successfully updated.');

        }catch(\Exception $e){
            DB::rollback();

            session()->flash('error');
        }
    }

    public function get_bills()
    {
        return Bill::where('property_uuid', Session::get('property'))
        ->where('batch_no', $this->batch_no)->get();
    }

    public function render()
    {
        return view('livewire.bill-edit-component', [
            'bills' => Property::find(Session::get('property'))->bills->where('batch_no', $this->batch_no),
        ]);
    }
}
