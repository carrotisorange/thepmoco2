<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendRemittanceToOwner;
use App\Models\{Remittance,Owner};

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
        $this->miscellaneousFeeDescription = Remittance::find($this->getRemittanceId())->miscellaneous_fee_description;
        $this->membershipFeeDescription = Remittance::find($this->getRemittanceId())->membership_fee_description;
        $this->condoDuesDescription = Remittance::find($this->getRemittanceId())->condo_dues_description;
        $this->parkingDuesDescription = Remittance::find($this->getRemittanceId())->parking_dues_description;
        $this->waterDescription = Remittance::find($this->getRemittanceId())->water_description;
        $this->electricityDescription = Remittance::find($this->getRemittanceId())->electricity_description;
        $this->generatorShareDescription = Remittance::find($this->getRemittanceId())->generator_share_description;
        $this->surchargesDescription = Remittance::find($this->getRemittanceId())->surcharges_description;
        $this->buildingInsuranceDescription = Remittance::find($this->getRemittanceId())->building_insurance_description;
        $this->realPropertyTaxDescription = Remittance::find($this->getRemittanceId())->real_property_tax_description;
        $this->housekeepingFeeDescription = Remittance::find($this->getRemittanceId())->housekeeping_fee_description;
        $this->laundryFeeDescription = Remittance::find($this->getRemittanceId())->laundry_fee_description;
        $this->complimentaryDescription = Remittance::find($this->getRemittanceId())->complimentary_description;
        $this->internetDescription = Remittance::find($this->getRemittanceId())->internet_description;
        $this->specialAssessmentDescription = Remittance::find($this->getRemittanceId())->special_assessment_description;
        $this->materialRecoveryFacilityDescription = Remittance::find($this->getRemittanceId())->materials_recovery_facility_description;
        $this->rechargeOfFireExtinguisherDescription = Remittance::find($this->getRemittanceId())->recharge_of_fire_extinguisher_description;
        $this->environmentalFeeDescription = Remittance::find($this->getRemittanceId())->environmental_fee_description;
        $this->bladderTankDescription = Remittance::find($this->getRemittanceId())->bladder_tank_description;
        $this->causeOfMagnetDescription = Remittance::find($this->getRemittanceId())->cause_of_magnet_description;
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

        session()->flash('success', 'Changes Saved!');
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
        $this->miscellaneousFeeDescription = Remittance::find($this->getRemittanceId())->miscellaneous_fee_description;
        $this->membershipFeeDescription = Remittance::find($this->getRemittanceId())->membership_fee_description;
        $this->condoDuesDescription = Remittance::find($this->getRemittanceId())->condo_dues_description;
        $this->parkingDuesDescription = Remittance::find($this->getRemittanceId())->parking_dues_description;
        $this->waterDescription = Remittance::find($this->getRemittanceId())->water_description;
        $this->electricityDescription = Remittance::find($this->getRemittanceId())->electricity_description;
        $this->generatorShareDescription = Remittance::find($this->getRemittanceId())->generator_share_description;
        $this->surchargesDescription = Remittance::find($this->getRemittanceId())->surcharges_description;
        $this->buildingInsuranceDescription = Remittance::find($this->getRemittanceId())->building_insurance_description;
        $this->realPropertyTaxDescription = Remittance::find($this->getRemittanceId())->real_property_tax_description;
        $this->housekeepingFeeDescription = Remittance::find($this->getRemittanceId())->housekeeping_fee_description;
        $this->laundryFeeDescription = Remittance::find($this->getRemittanceId())->laundry_fee_description;
        $this->complimentaryDescription = Remittance::find($this->getRemittanceId())->complimentary_description;
        $this->internetDescription = Remittance::find($this->getRemittanceId())->internet_description;
        $this->specialAssessmentDescription = Remittance::find($this->getRemittanceId())->special_assessment_description;
        $this->materialRecoveryFacilityDescription = Remittance::find($this->getRemittanceId())->materials_recovery_facility_description;
        $this->rechargeOfFireExtinguisherDescription = Remittance::find($this->getRemittanceId())->recharge_of_fire_extinguisher_description;
        $this->environmentalFeeDescription = Remittance::find($this->getRemittanceId())->environmental_fee_description;
        $this->bladderTankDescription = Remittance::find($this->getRemittanceId())->bladder_tank_description;
        $this->causeOfMagnetDescription = Remittance::find($this->getRemittanceId())->cause_of_magnet_description;
    }

    function sendRemittanceToOwner(){
        sleep(2);

        $owner_uuid = Remittance::find($this->getRemittanceId())->owner_uuid;
        $owner = Owner::find($owner_uuid);

        if(!$owner_uuid || !$owner->email){
            return redirect(url()->previous())->with('error','Email is missing');
        }else{

            $data = [
                'owner' => $owner->owner,
                'unit' => $this->unit->unit,
                'date' => Remittance::find( $this->getRemittanceId())->created_at,
                'amountCollected' => Remittance::find($this->getRemittanceId())->monthly_rent +
                Remittance::find($this->getRemittanceId())->marketing_fee +
                Remittance::find($this->getRemittanceId())->management_fee ,
                'rent' => Remittance::find($this->getRemittanceId())->monthly_rent,
                'deductions' => Remittance::find($this->getRemittanceId())->total_deductions,
                'bankTransferFee' => Remittance::find($this->getRemittanceId())->bank_transfer_fee,
                'managementFee' => Remittance::find($this->getRemittanceId())->management_fee,
                'marketingFee' => Remittance::find($this->getRemittanceId())->marketing_fee,

                'miscellaneousFee' => Remittance::find($this->getRemittanceId())->miscellaneous_fee,
                'miscellaneousFeeDescription' => Remittance::find($this->getRemittanceId())->miscellaneous_fee_description,
                'membershipFee' => Remittance::find($this->getRemittanceId())->membership_fee,
                'membershipFeeDescription' => Remittance::find($this->getRemittanceId())->membership_fee_description,
                'condoDues' => Remittance::find($this->getRemittanceId())->condo_dues,
                'condoDuesDescription' => Remittance::find($this->getRemittanceId())->condo_dues_description,
                'parkingDues' => Remittance::find($this->getRemittanceId())->parking_dues,
                'parkingDuesDescription' => Remittance::find($this->getRemittanceId())->parking_dues_description,
                'water' => Remittance::find($this->getRemittanceId())->water,
                'waterDescription' => Remittance::find($this->getRemittanceId())->water_description,
                'electricity' => Remittance::find($this->getRemittanceId())->electricity,
                'electricityDescription' => Remittance::find($this->getRemittanceId())->electricity_description,
                'generatorShare' => Remittance::find($this->getRemittanceId())->generator_share,
                'generatorShareDescription' => Remittance::find($this->getRemittanceId())->generator_share_description,
                'surcharges' => Remittance::find($this->getRemittanceId())->surcharges,
                'surchargesDescription' => Remittance::find($this->getRemittanceId())->surcharges_description,
                'buildingInsurance' => Remittance::find($this->getRemittanceId())->building_insurance,
                'buildingInsuranceDescription' => Remittance::find($this->getRemittanceId())->building_insurance_description,
                'realPropertyTax' => Remittance::find($this->getRemittanceId())->real_property_tax,
                'realPropertyTaxDescription' => Remittance::find($this->getRemittanceId())->real_property_tax_description,
                'housekeepingFee' => Remittance::find($this->getRemittanceId())->housekeeping_fee,
                'housekeepingFeeDescription' => Remittance::find($this->getRemittanceId())->housekeeping_fee_description,
                'laundryFee' => Remittance::find($this->getRemittanceId())->laundry_fee,
                'laundryFeeDescription' => Remittance::find($this->getRemittanceId())->laundry_fee_description,
                'complimentary' => Remittance::find($this->getRemittanceId())->complimentary,
                'complimentaryDescription' => Remittance::find($this->getRemittanceId())->complimentary_description,
                'internet' => Remittance::find($this->getRemittanceId())->internet,
                'internetDescription' => Remittance::find($this->getRemittanceId())->internet_description,
                'specialAssessment' => Remittance::find($this->getRemittanceId())->special_assessment,
                'specialAssessmentDescription' => Remittance::find($this->getRemittanceId())->special_assessment_description,
                'materialRecoveryFacility' => Remittance::find($this->getRemittanceId())->materials_recovery_facility,
                'materialRecoveryFacilityDescription' => Remittance::find($this->getRemittanceId())->materials_recovery_facility_description,
                'rechargeOfFireExtinguisher' => Remittance::find($this->getRemittanceId())->recharge_of_fire_extinguisher,
                'rechargeOfFireExtinguisherDescription' => Remittance::find($this->getRemittanceId())->recharge_of_fire_extinguisher_description,
                'environmentalFee' => Remittance::find($this->getRemittanceId())->environmental_fee,
                'environmentalFeeDescription' => Remittance::find($this->getRemittanceId())->environmental_fee_description,
                'bladderTank' => Remittance::find($this->getRemittanceId())->bladder_tank,
                'bladderTankDescription' => Remittance::find($this->getRemittanceId())->bladder_tank_description,
                'causeOfMagnet' => Remittance::find($this->getRemittanceId())->cause_of_magnet,
                'causeOfMagnetDescription' => Remittance::find($this->getRemittanceId())->cause_of_magnet_description,
                'remittance' => Remittance::find($this->getRemittanceId())->remittance,
                'cv_no' => Remittance::find($this->getRemittanceId())->cv_no,
                'check_no' => Remittance::find($this->getRemittanceId())->check_no,
            ];

            Mail::to($owner->email)->send(new SendRemittanceToOwner($data));

            session()->flash('success', 'Changes Saved!');
        }

        return redirect('/property/'.$this->unit->property_uuid.'/unit/'.$this->unit->uuid.'/remittances');
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
