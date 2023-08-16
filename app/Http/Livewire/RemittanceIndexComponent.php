<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Remittance;
use Carbon\Carbon;
use App\Models\Collection;

class RemittanceIndexComponent extends Component
{
    public $property;
    public $remittances;
    public $created_at;
    public $date;

    public function mount(){
        $this->created_at = Carbon::parse(Remittance::where('property_uuid', $this->property->uuid)->orderBy('id', 'desc')->pluck('created_at')->first());
        $this->date = Carbon::now()->format('Y-m-d');
        $this->remittances = $this->get_remittances();
    }

    protected function rules()
    {
        return [
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
            'remittances.*.bladder_tank' => 'nullable',
            'remittances.*.cause_of_magnet' => 'nullable',
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
                'bladder_tank' => $remittance->bladder_tank,
                'cause_of_magnet' => $remittance->cause_of_magnet,
                'total_deductions' => $remittance->management_fee + $remittance->marketing_fee + $remittance->bank_transfer_fee + $remittance->miscellaneous_fee + $remittance->membership_fee + $remittance->condo_dues
                + $remittance->parking_dues + $remittance->water + $remittance->electricity + $remittance->surcharges + $remittance->building_insurance 
                + $remittance->real_property_tax + $remittance->housekeeping_fee + $remittance->laundry_fee + $remittance->complimentary + $remittance->internet
                + $remittance->special_assessment + $remittance->materials_recovery_facility + $remittance->recharge_of_fire_extinguisher + $remittance->recharge_of_fire_extinguisher 
                + $remittance->environmental_fee + $remittance->bladder_tank + $remittance->cause_of_magnet,
                'remittance' => $remittance->net_rent - ($remittance->bank_transfer_fee + $remittance->miscellaneous_fee + $remittance->membership_fee + $remittance->condo_dues
                + $remittance->parking_dues + $remittance->water + $remittance->electricity + $remittance->surcharges + $remittance->building_insurance 
                + $remittance->real_property_tax + $remittance->housekeeping_fee + $remittance->laundry_fee + $remittance->complimentary + $remittance->internet
                + $remittance->special_assessment + $remittance->materials_recovery_facility + $remittance->recharge_of_fire_extinguisher + $remittance->recharge_of_fire_extinguisher 
                + $remittance->environmental_fee + $remittance->bladder_tank + $remittance->cause_of_magnet),
                'cv_no' => $remittance->cv_no,
                'check_no' => $remittance->check_no
            ]);

            $this->remittances = $this->get_remittances();
            }

            session()->flash('success', 'Success!');

        }catch(\Exception $e){
        
            return back()->with('error','Cannot perform the action. Please try again.');
       }
    }

    public function storeRemittance(){
        sleep(2);

        $this->validate([
            'date' => 'required|date'
        ]);

        $collections = Collection::where('property_uuid', $this->property->uuid)
           ->whereMonth('created_at', Carbon::parse($this->date)->month)
           ->get();

        foreach($collections as $collection){
             if($collection->bill->particular_id === 1){
                app('App\Http\Controllers\PropertyRemittanceController')->store(
                    $collection->property_uuid,
                    $collection->unit->uuid,
                    $collection->ar_no,
                    $collection->bill->particular_id,
                    $collection->tenant_uuid,
                    $collection->guest_uuid,
                    $this->date,
                    $collection->collection
                );
            }
            continue;
        }

        return redirect('/property/'.$this->property->uuid.'/remittance')->with('success', 'Success!');

    }

    public function redirectToOwnerPage(){
        return redirect('/property/'.$this->property->uuid.'/collection/');
    }

    public function get_remittances(){
        return Remittance::where('property_uuid', $this->property->uuid)
        ->whereMonth('created_at', Carbon::parse($this->created_at)->month)
        ->get();
    }

    public function updatedCreatedAt(){
        $this->remittances = $this->get_remittances();
    }

    public function render()
    {
        
        return view('livewire.remittance-index-component',[

            'dates' => Remittance::where('property_uuid', $this->property->uuid)
            ->groupBy('created_at')    
            ->get(),

            'collectionsCount' => Collection::where('collections.property_uuid', $this->property->uuid)
            ->whereNotNull('collections.tenant_uuid')
            ->join('bills', 'collections.bill_id', 'bills.id')
            ->where('bills.particular_id', 1)
            ->whereMonth('collections.created_at', Carbon::parse($this->date)->month)
            ->count(),
            
        ]);
    }
}
