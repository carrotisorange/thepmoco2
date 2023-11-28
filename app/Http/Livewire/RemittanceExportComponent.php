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
        Session::put('bank_transfer_fee', $this->bank_transfer_fee);
        Session::put('miscellaneous_fee', $this->miscellaneous_fee);
        Session::put('membership_fee', $this->membership_fee);
        Session::put('condo_dues', $this->condo_dues);
        Session::put('parking_dues', $this->parking_dues);
        Session::put('water', $this->water);
        Session::put('electricity', $this->electricity);
        Session::put('generator_share', $this->generator_share);
        Session::put('surcharges', $this->surcharges);
        Session::put('building_insurance', $this->building_insurance);
        Session::put('real_property_tax', $this->real_property_tax);
        Session::put('housekeeping_fee', $this->housekeeping_fee);
        Session::put('laundry_fee', $this->laundry_fee);
        Session::put('complimentary', $this->complimentary);
        Session::put('internet', $this->internet);
        Session::put('special_assessment', $this->special_assessment);
        Session::put('materials_recovery_facility', $this->materials_recovery_facility);
        Session::put('recharge_of_fire_extinguisher', $this->recharge_of_fire_extinguisher);
        Session::put('environmental_fee', $this->environmental_fee);
        Session::put('bladder_tank', $this->bladder_tank);
        Session::put('cause_of_magnet', $this->cause_of_magnet);

        return redirect('/property/'.Session::get('property_uuid').'/remittance/export/date/'.$this->date);

    }
    public function render()
    {
        return view('livewire.remittance-export-component');
    }
}
