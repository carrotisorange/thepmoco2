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
    // public $bladderTankDescription;
    // public $causeOfMagnetDescription;


    public function mount(){
        $this->miscellaneousFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('miscellaneous_fee_description');
        $this->membershipFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('membership_fee_description');
        $this->condoDuesDescription = Remittance::where('id',$this->getRemittanceId())->value('condo_dues_description');
        $this->parkingDuesDescription = Remittance::where('id',$this->getRemittanceId())->value('parking_dues_description');
        $this->waterDescription = Remittance::where('id',$this->getRemittanceId())->value('water_description');
        $this->electricityDescription = Remittance::where('id',$this->getRemittanceId())->value('electricity_description');
        $this->generatorShareDescription = Remittance::where('id',$this->getRemittanceId())->value('generator_share_description');
        $this->surchargesDescription = Remittance::where('id',$this->getRemittanceId())->value('surcharges_description');
        $this->buildingInsuranceDescription = Remittance::where('id',$this->getRemittanceId())->value('building_insurance_description');
        $this->realPropertyTaxDescription = Remittance::where('id',$this->getRemittanceId())->value('real_property_tax_description');
        $this->housekeepingFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('housekeeping_fee_description');
        $this->laundryFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('laundry_fee_description');
        $this->complimentaryDescription = Remittance::where('id',$this->getRemittanceId())->value('complimentary_description');
        $this->internetDescription = Remittance::where('id',$this->getRemittanceId())->value('internet_description');
        $this->specialAssessmentDescription = Remittance::where('id',$this->getRemittanceId())->value('special_assessment_description');
        $this->materialRecoveryFacilityDescription = Remittance::where('id',$this->getRemittanceId())->value('materials_recovery_facility_description');
        $this->rechargeOfFireExtinguisherDescription = Remittance::where('id',$this->getRemittanceId())->value('recharge_of_fire_extinguisher_description');
        $this->environmentalFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('environmental_fee_description');
        // $this->bladderTankDescription = Remittance::where('id',$this->getRemittanceId())->value('bladder_tank_description');
        // $this->causeOfMagnetDescription = Remittance::where('id',$this->getRemittanceId())->value('cause_of_magnet_description');
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
            // 'bladder_tank_description' => $this->bladderTankDescription,
            // 'cause_of_magnet_description' => $this->causeOfMagnetDescription
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
        $this->miscellaneousFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('miscellaneous_fee_description');
        $this->membershipFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('membership_fee_description');
        $this->condoDuesDescription = Remittance::where('id',$this->getRemittanceId())->value('condo_dues_description');
        $this->parkingDuesDescription = Remittance::where('id',$this->getRemittanceId())->value('parking_dues_description');
        $this->waterDescription = Remittance::where('id',$this->getRemittanceId())->value('water_description');
        $this->electricityDescription = Remittance::where('id',$this->getRemittanceId())->value('electricity_description');
        $this->generatorShareDescription = Remittance::where('id',$this->getRemittanceId())->value('generator_share_description');
        $this->surchargesDescription = Remittance::where('id',$this->getRemittanceId())->value('surcharges_description');
        $this->buildingInsuranceDescription = Remittance::where('id',$this->getRemittanceId())->value('building_insurance_description');
        $this->realPropertyTaxDescription = Remittance::where('id',$this->getRemittanceId())->value('real_property_tax_description');
        $this->housekeepingFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('housekeeping_fee_description');
        $this->laundryFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('laundry_fee_description');
        $this->complimentaryDescription = Remittance::where('id',$this->getRemittanceId())->value('complimentary_description');
        $this->internetDescription = Remittance::where('id',$this->getRemittanceId())->value('internet_description');
        $this->specialAssessmentDescription = Remittance::where('id',$this->getRemittanceId())->value('special_assessment_description');
        $this->materialRecoveryFacilityDescription = Remittance::where('id',$this->getRemittanceId())->value('materials_recovery_facility_description');
        $this->rechargeOfFireExtinguisherDescription = Remittance::where('id',$this->getRemittanceId())->value('recharge_of_fire_extinguisher_description');
        $this->environmentalFeeDescription = Remittance::where('id',$this->getRemittanceId())->value('environmental_fee_description');
        // $this->bladderTankDescription = Remittance::where('id',$this->getRemittanceId())->value('bladder_tank_description');
        // $this->causeOfMagnetDescription = Remittance::where('id',$this->getRemittanceId())->value('cause_of_magnet_description');
    }

    function sendRemittanceToOwner(){
        sleep(2);

        $owner_uuid = Remittance::where('id',$this->getRemittanceId())->value('owner_uuid');
        $owner = Owner::find($owner_uuid);

        if(!$owner_uuid || !$owner->email){
            return redirect(url()->previous())->with('error','Email is missing');
        }else{

            $data = [
                'owner' => $owner->owner,
                'unit' => $this->unit->unit,
                'date' => Remittance::find( $this->getRemittanceId())->value('created_at'),
                'amountCollected' => Remittance::where('id',$this->getRemittanceId())->value('monthly_rent') +Remittance::where('id',$this->getRemittanceId())->value('marketing_fee') +Remittance::where('id',$this->getRemittanceId())->value('management_fee'),
                'rent' => Remittance::where('id',$this->getRemittanceId())->value('monthly_rent'),
                'deductions' => Remittance::where('id',$this->getRemittanceId())->value('total_deductions'),
                'bankTransferFee' => Remittance::where('id',$this->getRemittanceId())->value('bank_transfer_fee'),
                'managementFee' => Remittance::where('id',$this->getRemittanceId())->value('management_fee'),
                'marketingFee' => Remittance::where('id',$this->getRemittanceId())->value('marketing_fee'),
                'miscellaneousFee' => Remittance::where('id',$this->getRemittanceId())->value('miscellaneous_fee'),
                'miscellaneousFeeDescription' => Remittance::where('id',$this->getRemittanceId())->value('miscellaneous_fee_description'),
                'membershipFee' => Remittance::where('id',$this->getRemittanceId())->value('membership_fee'),
                'membershipFeeDescription' => Remittance::where('id',$this->getRemittanceId())->value('membership_fee_description'),
                'condoDues' => Remittance::where('id',$this->getRemittanceId())->value('condo_dues'),
                'condoDuesDescription' => Remittance::where('id',$this->getRemittanceId())->value('condo_dues_description'),
                'parkingDues' => Remittance::where('id',$this->getRemittanceId())->value('parking_dues'),
                'parkingDuesDescription' => Remittance::where('id',$this->getRemittanceId())->value('parking_dues_description'),
                'water' => Remittance::where('id',$this->getRemittanceId())->value('water'),
                'waterDescription' => Remittance::where('id',$this->getRemittanceId())->value('water_description'),
                'electricity' => Remittance::where('id',$this->getRemittanceId())->value('electricity'),
                'electricityDescription' => Remittance::where('id',$this->getRemittanceId())->value('electricity_description'),
                'generatorShare' => Remittance::where('id',$this->getRemittanceId())->value('generator_share'),
                'generatorShareDescription' => Remittance::where('id',$this->getRemittanceId())->value('generator_share_description'),
                'surcharges' => Remittance::where('id',$this->getRemittanceId())->value('surcharges'),
                'surchargesDescription' => Remittance::where('id',$this->getRemittanceId())->value('surcharges_description'),
                'buildingInsurance' => Remittance::where('id',$this->getRemittanceId())->value('building_insurance'),
                'buildingInsuranceDescription' => Remittance::where('id',$this->getRemittanceId())->value('building_insurance_description'),
                'realPropertyTax' => Remittance::where('id',$this->getRemittanceId())->value('real_property_tax'),
                'realPropertyTaxDescription' => Remittance::where('id',$this->getRemittanceId())->value('real_property_tax_description'),
                'housekeepingFee' => Remittance::where('id',$this->getRemittanceId())->value('housekeeping_fee'),
                'housekeepingFeeDescription' => Remittance::where('id',$this->getRemittanceId())->value('housekeeping_fee_description'),
                'laundryFee' => Remittance::where('id',$this->getRemittanceId())->value('laundry_fee'),
                'laundryFeeDescription' => Remittance::where('id',$this->getRemittanceId())->value('laundry_fee_description'),
                'complimentary' => Remittance::where('id',$this->getRemittanceId())->value('complimentary'),
                'complimentaryDescription' => Remittance::where('id',$this->getRemittanceId())->value('complimentary_description'),
                'internet' => Remittance::where('id',$this->getRemittanceId())->value('internet'),
                'internetDescription' => Remittance::where('id',$this->getRemittanceId())->value('internet_description'),
                'specialAssessment' => Remittance::where('id',$this->getRemittanceId())->value('special_assessment'),
                'specialAssessmentDescription' => Remittance::where('id',$this->getRemittanceId())->value('special_assessment_description'),
                'materialRecoveryFacility' => Remittance::where('id',$this->getRemittanceId())->value('materials_recovery_facility'),
                'materialRecoveryFacilityDescription' => Remittance::where('id',$this->getRemittanceId())->value('materials_recovery_facility_description'),
                'rechargeOfFireExtinguisher' => Remittance::where('id',$this->getRemittanceId())->value('recharge_of_fire_extinguisher'),
                'rechargeOfFireExtinguisherDescription' => Remittance::where('id',$this->getRemittanceId())->value('recharge_of_fire_extinguisher_description'),
                'environmentalFee' => Remittance::where('id',$this->getRemittanceId())->value('environmental_fee'),
                'environmentalFeeDescription' => Remittance::where('id',$this->getRemittanceId())->value('environmental_fee_description'),
                // 'bladderTank' => Remittance::where('id',$this->getRemittanceId())->value('bladder_tank'),
                // 'bladderTankDescription' => Remittance::where('id',$this->getRemittanceId())->value('bladder_tank_description'),
                // 'causeOfMagnet' => Remittance::where('id',$this->getRemittanceId())->value('cause_of_magnet'),
                // 'causeOfMagnetDescription' => Remittance::where('id',$this->getRemittanceId())->value('cause_of_magnet_description'),
                'remittance' => Remittance::where('id',$this->getRemittanceId())->value('remittance'),
                'cv_no' => Remittance::where('id',$this->getRemittanceId())->value('cv_no'),
                'check_no' => Remittance::where('id',$this->getRemittanceId())->value('condo_dues_description'),
            ];

            Mail::to($owner->email)->send(new SendRemittanceToOwner($data));

            session()->flash('success', 'Changes Saved!');
        }

        return redirect('/property/'.$this->unit->property_uuid.'/unit/'.$this->unit->uuid.'/remittances');
    }

    public function render()
    {
        $remittance = Remittance::find($this->getRemittanceId());

        return view('livewire.features.remittance.remittance-show-component',[
            'remittance' => $remittance,
            'dates' => Remittance::where('property_uuid', $this->unit->property_uuid)
            ->where('unit_uuid', $this->unit->uuid)
            ->groupBy('created_at')
            ->orderBy('created_at', 'desc')
            ->get(),
        ]);
    }
}
