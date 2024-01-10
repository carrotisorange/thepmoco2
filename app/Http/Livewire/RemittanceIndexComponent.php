<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\{Remittance};

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
            'remittances.*.cv_no' => 'nullable',
            'remittances.*.check_no' => 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update($id){

        $this->validate();

        foreach ($this->remittances->where('id', $id) as $remittance) {

            app('App\Http\Controllers\Features\RemittanceController')->update($id, $remittance);

            $this->remittances = $this->get_remittances();

            session()->flash('success', 'Changes Saved!');
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
        $filterDates = Remittance::where('property_uuid', Session::get('property_uuid'))
        ->groupBy(DB::raw('date_format(created_at,"%m-%Y")'))
        ->orderBy(DB::raw('date_format(created_at,"%Y")'), 'desc')
        ->orderBy(DB::raw('date_format(created_at,"%m")'), 'desc')
        ->get();

        return view('livewire.features.remittance.remittance-index-component',compact('filterDates'));
    }
}
