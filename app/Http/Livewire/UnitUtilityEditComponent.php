<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Contract;
use App\Models\DeedOfSale;
use App\Models\Tenant;
use App\Models\Utility;
use App\Models\Owner;

class UnitUtilityEditComponent extends Component
{
    public $unit;
    public $type;
    public $utility;

    public $particular_id;
    public $start;
    public $end;
    public $bill;
    public $unit_uuid;
    public $isBillSplit = false;
    public $totalAmountDue;


    public function mount(){
       $this->totalAmountDue =  $this->utility->total_amount_due;
    }

    public function updateTotalAmountDue(){

        Utility::where('id', $this->utility->id)->update(
           [
             'total_amount_due' => $this->totalAmountDue,
             'status' => 'unbilled'
           ]
        );


        Bill::where('property_uuid', Session::get('property_uuid'))
        ->where('unit_uuid', $this->utility->unit->uuid)
        ->where('bill', $this->utility->total_amount_due)
        ->whereDate('start', $this->utility->start_date)
        ->whereDate('end', $this->utility->end_date)
        ->delete();



        return redirect('/property/'.Session::get('property_uuid').'/unit/'.$this->utility->unit->uuid)->with('success', 'Success');
    }

    
    public function render()
    {
        // ddd($this->get_particular_id($this->utility->type));

        return view('livewire.unit-utility-edit-component');
    }
}
