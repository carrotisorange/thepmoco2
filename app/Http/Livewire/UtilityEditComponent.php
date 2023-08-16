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

    public $utilities;

    public $search;
    public $start_date;
    public $end_date;
    public $kwh;
    public $min_charge;

    public $selectedUtilities = [];

    public $selectedAllUtilities = false;

    public $batch_no;

    public $property_uuid;



    public function mount($batch_no, $option)
    {
        $this->batch_no = $batch_no;

        $this->option = $option;

        $this->property_uuid = Session::get('property_uuid');

        $this->utilities = $this->get_utilities();

    }

    protected function rules()
    {
        return [
            'utilities.*.unit_uuid' => 'required',
            'utilities.*.start_date'     => 'nullable|date',
            'utilities.*.end_date' => 'nullable|date',
            'utilities.*.previous_reading' => 'nullable|',
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

        return redirect('/property/'.$this->property_uuid.'/utilities')->with('success', 'Success!');
    }
    
    public function updateUtilities($id)
    {        
        $this->validate();
        try{
 
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

                    $this->utilities = $this->get_utilities();

                     session()->flash('success', 'Success!');
                }
            // });

        }catch(\Exception $e){
       
            session()->flash('error', 'Something went wrong.');
        }

    }

    public function get_utilities(){
     
        return Utility::where('utilities.property_uuid', $this->property_uuid)
        ->join('units', 'utilities.unit_uuid', 'units.uuid')
        ->where('utilities.batch_no', $this->batch_no)
        ->orderByRaw('LENGTH(unit) ASC')->orderBy('unit', 'asc')
        ->get();
    }

    public function postUtilities()
    {
        

       // update utility status
        Utility::where('property_uuid', $this->property_uuid)
        ->where('batch_no', $this->batch_no)
        ->update([
            'is_posted' => true
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
        return view('livewire.utility-edit-component');
    }
}
