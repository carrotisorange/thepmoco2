<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Remittance;
use Carbon\Carbon;

class RemittanceShowComponent extends Component
{
    public $unit;

    public $remittanceDate;

    public $remittanceId;

    public $miscellaneousFeeDescription;
    public $membershipFeeDescription;
    public $condoDuesDescription;
    public $parkingDuesDescription;
    public $waterDescription;
    public $electricityDescription;
    public $generatorShareDescription;
    public $surchargesDescription;
    public $buildingInsuranceDescription;
    public $realPropertyTaxDescription;
    public $housekeepingFeeDescription;
    public $laundryFeeDescription;
    public $complimentaryDescription;
    public $internetDescription;
    public $specialAssessmentDescription;
    public $materialRecoveryFacilityDescription;
    public $rechargeOfFireExtinguisherDescription;
    public $environmentalFeeDescription;
    public $bladderTankDescription;
    public $causeOfMagnetDescription;


    public function mount(){
        $this->miscellaneousFeeDescription = Remittance::find( $this->getRemittanceId())->miscellaneous_fee_description;
        $this->membershipFeeDescription = Remittance::find( $this->getRemittanceId())->membership_fee_description;
        $this->condoDuesDescription = Remittance::find( $this->getRemittanceId())->condo_dues_description;
        $this->parkingDuesDescription = Remittance::find( $this->getRemittanceId())->parking_dues_description;
        $this->waterDescription = Remittance::find( $this->getRemittanceId())->water_description;
        $this->electricityDescription = Remittance::find( $this->getRemittanceId())->electricity_description;
        $this->generatorShareDescription = Remittance::find( $this->getRemittanceId())->generator_share_description;
        $this->surchargesDescription = Remittance::find( $this->getRemittanceId())->surcharges_description;
        $this->buildingInsuranceDescription = Remittance::find( $this->getRemittanceId())->building_insurance_description;
        $this->realPropertyTaxDescription = Remittance::find( $this->getRemittanceId())->real_property_tax_description;
        $this->housekeepingFeeDescription = Remittance::find( $this->getRemittanceId())->housekeeping_fee_description;
        $this->laundryFeeDescription = Remittance::find( $this->getRemittanceId())->laundry_fee_description;
        $this->complimentaryDescription = Remittance::find( $this->getRemittanceId())->complimentary_description;
        $this->internetDescription = Remittance::find( $this->getRemittanceId())->internet_description;
        $this->specialAssessmentDescription = Remittance::find( $this->getRemittanceId())->special_assessment_description;
        $this->materialRecoveryFacilityDescription = Remittance::find( $this->getRemittanceId())->materials_recovery_facility_description;
        $this->rechargeOfFireExtinguisherDescription = Remittance::find( $this->getRemittanceId())->recharge_of_fire_extinguisher_description;
        $this->environmentalFeeDescription = Remittance::find( $this->getRemittanceId())->environmental_fee_description;
        $this->bladderTankDescription = Remittance::find( $this->getRemittanceId())->bladder_tank_description;
        $this->causeOfMagnetDescription = Remittance::find( $this->getRemittanceId())->cause_of_magnet_description;
        
    }
    
    public function updateRemittance($id){

        Remittance::where('id', $id)
        ->update([
            'miscellaneous_fee_description' => $this->miscellaneousFeeDescription,
            'membership_fee_description' => $this->membershipFeeDescription,
            'condo_dues_description' => $this->condoDuesDescription,
            'parking_dues_description' => $this->parkingDuesDescription,
            'water_description' => $this->waterDescription,
            'electricity_description' => $this->electricityDescription,
            'generator_share_description' => $this->generatorShareDescription,
            'surcharges_description' => $this->surchargesDescription,
            'building_insurance_description' => $this->buildingInsuranceDescription,
            'real_property_tax_description' => $this->realPropertyTaxDescription,
            'housekeeping_fee_description' => $this->housekeepingFeeDescription,
            'laundry_fee_description' => $this->laundryFeeDescription,
            'complimentary_description' => $this->complimentaryDescription,
            'internet_description' => $this->internetDescription,
            'special_assessment_description' => $this->specialAssessmentDescription,
            'materials_recovery_facility_description' => $this->materialRecoveryFacilityDescription,
            'recharge_of_fire_extinguisher_description' => $this->rechargeOfFireExtinguisherDescription,
            'environmental_fee_description' => $this->environmentalFeeDescription,
            'bladder_tank_description' => $this->bladderTankDescription,
            'cause_of_magnet_description' => $this->causeOfMagnetDescription
        ]);

        session()->flash('success', 'Success!');
    }

    public function getRemittanceId(){
        return Remittance::where('unit_uuid', $this->unit->uuid)
        ->orderBy('created_at', 'desc')
        ->when(($this->remittanceDate), function($query){
            $query->whereMonth('created_at', Carbon::parse($this->remittanceDate)->month);
        })
        ->pluck('id')->first();
    }


    function updatedRemittanceDate(){
        $this->miscellaneousFeeDescription = Remittance::find( $this->getRemittanceId())->miscellaneous_fee_description;
        $this->membershipFeeDescription = Remittance::find( $this->getRemittanceId())->membership_fee_description;
        $this->condoDuesDescription = Remittance::find( $this->getRemittanceId())->condo_dues_description;
        $this->parkingDuesDescription = Remittance::find( $this->getRemittanceId())->parking_dues_description;
        $this->waterDescription = Remittance::find( $this->getRemittanceId())->water_description;
        $this->electricityDescription = Remittance::find( $this->getRemittanceId())->electricity_description;
        $this->generatorShareDescription = Remittance::find( $this->getRemittanceId())->generator_share_description;
        $this->surchargesDescription = Remittance::find( $this->getRemittanceId())->surcharges_description;
        $this->buildingInsuranceDescription = Remittance::find( $this->getRemittanceId())->building_insurance_description;
        $this->realPropertyTaxDescription = Remittance::find( $this->getRemittanceId())->real_property_tax_description;
        $this->housekeepingFeeDescription = Remittance::find( $this->getRemittanceId())->housekeeping_fee_description;
        $this->laundryFeeDescription = Remittance::find( $this->getRemittanceId())->laundry_fee_description;
        $this->complimentaryDescription = Remittance::find( $this->getRemittanceId())->complimentary_description;
        $this->internetDescription = Remittance::find( $this->getRemittanceId())->internet_description;
        $this->specialAssessmentDescription = Remittance::find( $this->getRemittanceId())->special_assessment_description;
        $this->materialRecoveryFacilityDescription = Remittance::find( $this->getRemittanceId())->materials_recovery_facility_description;
        $this->rechargeOfFireExtinguisherDescription = Remittance::find( $this->getRemittanceId())->recharge_of_fire_extinguisher_description;
        $this->environmentalFeeDescription = Remittance::find( $this->getRemittanceId())->environmental_fee_description;
        $this->bladderTankDescription = Remittance::find( $this->getRemittanceId())->bladder_tank_description;
        $this->causeOfMagnetDescription = Remittance::find( $this->getRemittanceId())->cause_of_magnet_description;
    }

    public function render()
    {        
        return view('livewire.remittance-show-component',[
            'remittance' => Remittance::find($this->getRemittanceId()),

            'dates' => Remittance::where('property_uuid', $this->unit->property_uuid)
            ->where('unit_uuid', $this->unit->uuid)
            ->groupBy('created_at')
            ->orderBy('created_at', 'desc')
            ->get(),
        ]);
    }
}
