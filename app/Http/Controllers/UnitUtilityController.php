<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitUtilityController extends Controller
{
    public function store($unit_uuid, $previous_water_reading, $previous_electric_reading){
        Unit::where('uuid', $unit_uuid)
        ->update([
           'previous_water_reading' => $previous_water_reading,
           'previous_electric_reading' => $previous_electric_reading 
        ]);
    }
}
