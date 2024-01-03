<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use DB;
use App\Models\{Collection,Remittance};

class RemittanceIndexComponent extends Component
{
    public $remittances;
    public $created_at;

    public function mount(){
        $this->created_at = Carbon::parse(Remittance::where('property_uuid', Session::get('property_uuid'))->orderBy('id', 'desc')->pluck('created_at')->first());
        $this->remittances = $this->get_remittances();
    }

    protected function rules()
    {
        return [
            'remittances.*.management_fee' => 'nullable',
            'remittances.*.bank_transfer_fee' => 'nullable',
            'remittances.*.miscellaneous_fee' => 'nullable',
            'remittances.*.membership_fee' => 'nullable',
            'remittances.*.condo_dues' => 'nullable',
            'remittances.*.parking_dues' => 'nullable',
            'remittances.*.water' => 'nullable',
            'remittances.*.electricity' => 'nullable',
            'remittances.*.generator_share' => 'nullable',
            'remittances.*.surcharges' => 'nullable',
            'remittances.*.building_insurance' => 'nullable',
            'remittances.*.real_property_tax' => 'nullable',
            'remittances.*.housekeeping_fee' => 'nullable',
            'remittances.*.laundry_fee' => 'nullable',
            'remittances.*.complimentary' => 'nullable',
            'remittances.*.internet' => 'nullable',
            'remittances.*.special_assessment' => 'nullable',
            'remittances.*.materials_recovery_facility' => 'nullable',
            'remittances.*.recharge_of_fire_extinguisher' => 'nullable',
            'remittances.*.environmental_fee' => 'nullable',
            // 'remittances.*.bladder_tank' => 'nullable',
            // 'remittances.*.cause_of_magnet' => 'nullable',
            'remittances.*.cv_no' => 'nullable',
            'remittances.*.check_no' => 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateRemittance($id){

        $this->validate();

        try{
            foreach ($this->remittances->where('id', $id) as $remittance) {

            Remittance::where('id', $id)
            ->update([
                'management_fee' => $remittance->management_fee,
                'bank_transfer_fee' => $remittance->bank_transfer_fee,
                'miscellaneous_fee' => $remittance->miscellaneous_fee,
                'membership_fee' => $remittance->membership_fee,
                'condo_dues' => $remittance->condo_dues,
                'parking_dues' => $remittance->parking_dues,
                'water' => $remittance->water,
                'electricity' => $remittance->electricity,
                'surcharges' => $remittance->surcharges,
                'building_insurance' => $remittance->building_insurance,
                'real_property_tax' => $remittance->real_property_tax,
                'generator_share' => $remittance->generator_share,
                'housekeeping_fee' => $remittance->housekeeping_fee,
                'laundry_fee' => $remittance->laundry_fee,
                'complimentary' => $remittance->complimentary,
                'internet' => $remittance->internet,
                'special_assessment' => $remittance->special_assessment,
                'materials_recovery_facility' => $remittance->materials_recovery_facility,
                'recharge_of_fire_extinguisher' => $remittance->recharge_of_fire_extinguisher,
                'environmental_fee' => $remittance->environmental_fee,
                // 'bladder_tank' => $remittance->bladder_tank,
                // 'cause_of_magnet' => $remittance->cause_of_magnet,
                'total_deductions' => $remittance->management_fee + $remittance->marketing_fee + $remittance->bank_transfer_fee + $remittance->miscellaneous_fee + $remittance->membership_fee + $remittance->condo_dues
                + $remittance->parking_dues + $remittance->water + $remittance->electricity + $remittance->surcharges + $remittance->building_insurance
                + $remittance->real_property_tax + $remittance->housekeeping_fee + $remittance->laundry_fee + $remittance->complimentary + $remittance->internet
                + $remittance->special_assessment + $remittance->materials_recovery_facility + $remittance->recharge_of_fire_extinguisher + $remittance->recharge_of_fire_extinguisher
                + $remittance->environmental_fee,
                'remittance' => $remittance->monthly_rent - ($remittance->management_fee + $remittance->marketing_fee + $remittance->bank_transfer_fee + $remittance->miscellaneous_fee + $remittance->membership_fee + $remittance->condo_dues
                + $remittance->parking_dues + $remittance->water + $remittance->electricity + $remittance->surcharges + $remittance->building_insurance
                + $remittance->real_property_tax + $remittance->housekeeping_fee + $remittance->laundry_fee + $remittance->complimentary + $remittance->internet
                + $remittance->special_assessment + $remittance->materials_recovery_facility + $remittance->recharge_of_fire_extinguisher + $remittance->recharge_of_fire_extinguisher
                + $remittance->environmental_fee),
                'cv_no' => $remittance->cv_no,
                'check_no' => $remittance->check_no
            ]);

            $this->remittances = $this->get_remittances();
            }

            session()->flash('success', 'Changes Saved!');

        }catch(\Exception $e){

            return back()->with('error','Cannot perform the action. Please try again.');
       }
    }

    public function get_remittances(){
        return Remittance::where('property_uuid', Session::get('property_uuid'))
        ->whereMonth('created_at', Carbon::parse($this->created_at)->month)
        ->whereYear('created_at', Carbon::parse($this->created_at)->year)
        ->get();
    }

    public function updatedCreatedAt(){
        $this->remittances = $this->get_remittances();
    }

    public function render()
    {
        return view('livewire.features.remittance.remittance-index-component',[

            'filterDates' => Remittance::where('property_uuid', Session::get('property_uuid'))
            ->groupBy(DB::raw('month(created_at)+"-"+year(created_at)'))
            ->get(),

        ]);
    }
}
