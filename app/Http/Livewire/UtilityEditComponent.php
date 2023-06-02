<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;

use Livewire\Component;
use Session;
use App\Models\Utility;
use App\Models\Unit;

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

    public $batch_no;

    public $property_uuid;

    public function mount($batch_no, $option)
    {
        $this->batch_no = $batch_no;

        $this->option = $option;

        $this->property_uuid = Session::get('property');
        
        // $this->start_date =  UtilityParameter::where('property_uuid', $this->property_uuid)->where('batch_no', $this->batch_no)->pluck('start_date')->last();

        // $this->end_date = UtilityParameter::where('property_uuid', $this->property_uuid)->where('batch_no', $this->batch_no)->pluck('end_date')->last();

        // $this->min_charge = UtilityParameter::where('property_uuid', $this->property_uuid)->where('batch_no', $this->batch_no)->pluck('min_charge')->last();

        // $this->kwh = UtilityParameter::where('property_uuid', $this->property_uuid)->where('batch_no', $this->batch_no)->pluck('value')->last();
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

    public function returnToUtilitiesPage(){
        
        Utility::where('property_uuid', $this->property_uuid)
        ->where('batch_no', $this->batch_no)
        ->delete();

        return redirect('/property/'.$this->property_uuid.'/utilities')->with('success', 'Sucess');
    }
    
    public function updateUtilities($id)
    {
        // ddd($this->kwh);
        
        try{
            $this->validate();

            //update the selected unit

            // DB::transaction(function () {
                foreach ($this->utilities->where('id', $id) as $utility) {
                     Utility::where('id', $id)
                     ->update([
                        'previous_reading' => $utility->previous_reading,
                        'current_reading' => $utility->current_reading,
                        'kwh' => $utility->kwh,
                        'min_charge' => $utility->min_charge,
                        'current_consumption' => ($utility->current_reading - $utility->previous_reading),
                        'total_amount_due' => (($utility->current_reading - $utility->previous_reading) * $utility->kwh) + $utility->min_charge,
                     ]);    

                    //$this->utilities = $this->get_utilities();

                     session()->flash('success', 'Success!');
                }
            // });

        }catch(\Exception $e){
       
            session()->flash('error');
        }

    }

    public function get_utilities(){
     
        return Utility::where('utilities.property_uuid', $this->property_uuid)
        ->join('units', 'utilities.unit_uuid', 'units.uuid')
        ->where('utilities.batch_no', $this->batch_no)
        ->orderByRaw('LENGTH(unit) ASC')->orderBy('unit', 'asc')
        ->get();
    }

  

    // public function updateParameters()
    // {
    //     if(!$this->start_date || !$this->end_date){
    //         $this->showUtilities = false;
    //         return back()->with('error', 'Error');
    //     }

    //     $this->showUtilities = true;
    //     //destroy previous utility parameters
    //     app('App\Http\Controllers\UtilityParameterController')->destroy($this->batch_no, $this->property_uuid);
        
    //     //store new utility parameters
    //     app('App\Http\Controllers\UtilityParameterController')->store($this->batch_no, $this->property_uuid, $this->start_date, $this->end_date, $this->option, $this->kwh, $this->min_charge);

    //     //update utilities
    //     foreach ($this->utilities as $utility) {
    //                 Utility::where('property_uuid', $this->property_uuid)->where('batch_no', $this->batch_no)
    //                  ->update([
    //                     'start_date' => $this->start_date,
    //                     'end_date' => $this->end_date, 
    //                     'min_charge' => $this->min_charge,
    //                     'kwh' => $this->kwh,
    //                     'total_amount_due' => $this->min_charge,
    //     ]);    

    //     session()->flash('success', 'Success!');
    //  }
    // }

    public function postUtilities()
    {
        

       // update utility status
        Utility::where('property_uuid', $this->property_uuid)
        ->where('batch_no', $this->batch_no)
        ->update([
            'is_posted' => 1
        ]);

        //store utility parameters
         app('App\Http\Controllers\UtilityParameterController')->store($this->batch_no, $this->property_uuid, $this->start_date, $this->end_date, $this->option, $this->kwh, $this->min_charge);
        
        //store the previous utility reading to unit
         foreach ($this->utilities as $utility) {
            $this->update_unit($this->option, $utility->unit_uuid, $utility->current_reading);
         }

        return redirect('/property/'.$this->property_uuid.'/utilities')->with('success', 'Success!');

    }

    public function store_bill($unit_uuid, $option, $start_date, $end_date, $total_amount_due, $batch_no){
        if($option === 'electric'){
            app('App\Http\Controllers\BillController')->store($this->property_uuid, $unit_uuid, '',6, $start_date, $end_date, $total_amount_due, $batch_no, 0);
        }else{  
           app('App\Http\Controllers\BillController')->store($this->property_uuid, $unit_uuid, '' ,5, $start_date, $end_date, $total_amount_due, $batch_no, 0);
        }
    }

    public function update_unit($option, $unit_uuid, $current_reading)
    {
        if($option === 'electric'){
            Unit::where('uuid', $unit_uuid)
            ->update([
                'previous_electric_utility_reading' => $current_reading
        ]);
        }else{
            Unit::where('uuid',$unit_uuid,)
            ->update([
                'previous_water_utility_reading' => $current_reading
        ]);
        }
    }

    public function render()
    {   
        $this->utilities = $this->get_utilities();

        return view('livewire.utility-edit-component');
    }
}
