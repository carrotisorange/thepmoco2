<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;

use Livewire\Component;
use Session;
use Illuminate\Http\Request;
use App\Models\Utility;
use App\Models\Property;
use DB;
use Carbon\Carbon;

class UtilityEditComponent extends Component
{
    use WithPagination;

    public $option;

    public $search;
    public $start_date;
    public $end_date;
    public $kwh;
    public $min_charge;

    public $utilities;

    public $selectedUtilities = [];

    public $selectedAllUtilities = false;

    public function mount($batch_no, $option)
    {
        $this->batch_no = $batch_no;
        $this->option = $option;
        $this->utilities = $this->get_utilities();
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->addMonth()->format('Y-m-d');
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

        $this->utilities = $this->get_utilities();
    }

    protected function rules()
    {
        return [
            'utilities.*.unit_uuid' => 'required',
            'utilities.*.start_date' => 'nullable|date',
            'utilities.*.end_date' => 'nullable|date',
            'utilities.*.previous_reading' => 'nullable',
            'utilities.*.current_reading' => 'nullable',
            'utilities.*.current_consumption' => 'nullable',
            'utilities.*.kwh' => 'nullable',
            'utilities.*.min_charge' => 'nullable',
            'utilities.*.total_amount_due' => 'nullable'
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);
    }
    
    public function updateUtilities($id)
    {
        sleep(1);
        
        try{
            $this->validate();
            //update the selected unit
            DB::transaction(function () {
                foreach ($this->utilities as $utility) {
                    $utility->save();
                    $this->utilities = $this->get_utilities();
                }
            });

            session()->flash('success', 'Utilities are successfully saved!');

        }catch(\Exception $e){
            session()->flash('error');
        }

    }

    public function get_utilities(){
     
        return Property::find(Session::get('property'))
        ->utilities
        ->where('batch_no', $this->batch_no);
    }

    public function updateParameters()
    {
        sleep(1);
        Utility::where('property_uuid', Session::get('property'))
        ->where('batch_no', $this->batch_no)
        ->update([
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'kwh' => $this->kwh,
            'min_charge' => $this->min_charge
        ]);

        $this->utilities = $this->get_utilities();

        session()->flash('success', 'Parameters are successfully saved!');

    }

    public function postUtilities()
    {
        sleep(1);
        Utility::where('property_uuid', Session::get('property'))
        ->where('batch_no', $this->batch_no)
        ->update([
            'is_posted' => 1
        ]);

        return redirect('/property/'.Session::get('property').'/utilities')->with('success', 'Utilities are successfully posted!');

    }

    public function removeUtilities($id)
    {
        sleep(1);

        Utility::where('id', $id)->delete();

        $this->utilities = $this->get_utilities();

        session()->flash('success', 'Utility is successfully removed');
    }
    
    public function render()
    {   
        $this->utilities = $this->get_utilities();

        return view('livewire.utility-edit-component');
    }
}
