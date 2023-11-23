<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;

class RemittanceExportComponent extends Component
{
    public $date;

    public $bank_transfer_fee;
    public $miscellaneous_fee;
    public $membership_fee;
    public $condo_dues;
    public $parking_dues;
    public $water;
    public $electricity;
    public $generator_share;
    public $surcharges;
    public $building_insurance;
    public $real_property_tax;
    public $housekeeping_fee;
    public $laundry_fee;
    public $complimentary;
    public $internet;
    public $special_assessment;
    public $materials_recovery_facility;
    public $recharge_of_fire_extinguisher;
    public $environmental_fee;
    public $bladder_tank;
    public $cause_of_magnet;

    public function exportRemittance(){
         return redirect('/property/'.Session::get('property_uuid').'/remittance/export/date/'.$this->date.'/'.$this->bank_transfer_fee);
    }
    public function render()
    {
        return view('livewire.remittance-export-component');
    }
}
