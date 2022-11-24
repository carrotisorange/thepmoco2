<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;

use Livewire\Component;
use Session;
use App\Models\Utility;
use App\Models\Property;
use DB;

class UtilityEditComponent extends Component
{
    use WithPagination;

    public $search;
    public $start_date;
    public $end_date;
    public $kwh;
    public $min_charge;

    public $utilities;

    public $selectedUtilities = [];

    public $selectedAllUtilities = false;

    public function mount($batch_no)
    {
        $this->batch_no = $batch_no;
        $this->utilities = $this->get_utilities();
    }

    public function selectedAllUtilities($selectedAllUtilities)
    {   
        if($selectedAllUtilities)
        {
            $this->selectedUtilities = $this->get_utilities()->pluck('id');

        }else
        {
            $this->selectedUtilities = [];
        }
    }

    protected function rules()
    {
        return [
            'utilities.*.unit_uuid' => 'required',
            'utilities.*.start_date' => 'required|date',
            'utilities.*.end_date' => 'required|date',
            'utilities.*.previous_reading' => 'required',
            'utilities.*.current_reading' => 'required',
            'utilities.*.current_consumption' => 'required',
            'utilities.*.kwh' => 'required',
            'utilities.*.min_charge' => 'required',
            'utilities.*.total_amount_due' => 'required'
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function updateForm()
    {
        sleep (2);
        
        try{
            $this->validate();
            //update the selected unit
            DB::transaction(function () {
                foreach ($this->utilities as $utility) {
                    $utility->save();
                }
            });

            return back()->with('success', 'Utilities are successfully saved!');

        }catch(\Exception $e){
            session()->flash('error');
        }
    }

    public function get_utilities(){
        // return DB::table('utilities')
        // ->select('*', 'units.unit as unit')
        // ->where('utilities.property_uuid', Session::get('property'))
        // ->where('utilities.batch_no', $this->batch_no)
        // ->join('units', 'utilities.unit_uuid', 'units.uuid')
        // ->groupBy('utilities.unit_uuid')
        // ->get();

        return Property::find(Session::get('property'))
        ->utilities
        ->where('batch_no', $this->batch_no);
    }

    public function updateUtilityParameters()
    {
        Utility::where('property_uuid', Session::get('property'))
        ->where('batch_no', $this->batch_no)
        ->update([
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'kwh' => $this->kwh,
            'min_charge' => $this->min_charge
        ]);
    }

    public function render()
    {   
        //$this->updateUtilityParameters();
        return view('livewire.utility-edit-component',[
            'utilities' => $this->get_utilities()
        ]);
    }
}
