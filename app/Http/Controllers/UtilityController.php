<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use DB;
use App\Models\Property;
use Session;

class UtilityController extends Controller
{
    
    public function store($property_uuid, $unit_uuid, $previous_water_utility_reading, $previous_electric_utility_reading, $user_id, $start_date, $end_date, $batch_no, $option, $rate, $min_charge)
    {
        if($option === 'electric')
        {
            $this->store_utilities_by_type($property_uuid, $unit_uuid, $previous_electric_utility_reading, $user_id, $start_date, $end_date, $batch_no, $option, $rate, $min_charge);
        }else{
            $this->store_utilities_by_type($property_uuid, $unit_uuid, $previous_water_utility_reading, $user_id, $start_date, $end_date, $batch_no, $option, $rate, $min_charge);
        }
       
    }

    public function store_utilities_by_type($property_uuid, $unit_uuid, $utility_type, $user_id, $start_date, $end_date, $batch_no, $option, $rate, $min_charge)
    {
        Utility::create(
        [
            'property_uuid' => $property_uuid,
            'unit_uuid' => $unit_uuid,
            'previous_reading' => $utility_type,
            'current_reading' => $utility_type,
            'current_consumption' => 0,
            'total_amount_due' => 0,
            'user_id' => $user_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'batch_no' => $batch_no,
            'type' => $option,
            'kwh' => $rate,
            'min_charge' => $min_charge
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function edit($property_uuid, $batch_no, $option)
    {
       return view('utilities.edit',[
            'batch_no' => $batch_no,
            'option' => $option
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function update($property_uuid, $batch_no, $start_date, $end_date, $kwh, $min_charge)
    {
         Utility::where('property_uuid', $property_uuid)
         ->where('batch_no', $batch_no)
         ->update([
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'kwh' => $kwh,
                    'min_charge' => $min_charge,
                    'current_consumption' => DB::raw('current_reading-previous_reading'), 
                    'total_amount_due' => DB::raw('((current_reading-previous_reading)*kwh)+'.$min_charge)
         ]);
    }
}
