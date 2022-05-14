<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Session;
use App\Models\Bill;

class BillEditComponent extends Component
{
    public $batch_no;
    public $selectedBills = [];
    public $selectAll = false;

     public function updatedSelectAll($value)
     {
        if($value)
        {
            $this->selectedBills = Bill::where('property_uuid', Session::get('property'))
            ->where('batch_no', $this->batch_no)
            ->pluck('id');
        }else
        {
            $this->selectedBills = [];
        }
     }

    public function deleteBills()
    {
       try{
            Bill::destroy($this->selectedBills);

            $this->selectedBills = [];

            session()->flash('success', 'Bills Successfully Deleted!');
       }catch(\Exception $e)
       {
            ddd($e);
       }
    }

    public function render()
    {
        return view('livewire.bill-edit-component', [
            'bills' => Property::find(Session::get('property'))->bills->where('batch_no', $this->batch_no),
        ]);
    }
}
