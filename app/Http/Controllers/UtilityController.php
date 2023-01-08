<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use DB;
use App\Models\Property;
use Session;

class UtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    { 
        app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id,'opens',21);
        
        return view('utilities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($property_uuid, $unit_uuid, $previous_water_utility_reading, $previous_electric_utility_reading, $user_id, $start_date, $end_date, $batch_no, $option)
    {
        if($option === 'electric')
        {
            $this->store_utilities_by_type($property_uuid, $unit_uuid, $previous_electric_utility_reading, $user_id, $start_date, $end_date, $batch_no, $option);
        }else{
            $this->store_utilities_by_type($property_uuid, $unit_uuid, $previous_water_utility_reading, $user_id, $start_date, $end_date, $batch_no, $option);
        }
       
    }

    public function store_utilities_by_type($property_uuid, $unit_uuid, $utility_type, $user_id, $start_date, $end_date, $batch_no, $option)
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
            'type' => $option
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
