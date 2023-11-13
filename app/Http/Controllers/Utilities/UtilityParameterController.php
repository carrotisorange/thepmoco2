<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\UtilityParameter;

class UtilityParameterController extends Controller
{
   public function store($batch_no, $property_uuid, $start_date, $end_date, $type, $rate, $min_charge){
      UtilityParameter::updateOrCreate(
         [
            'batch_no' => $batch_no,
            'property_uuid' => $property_uuid,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'type' => $type,
            'value' => $rate,
            'min_charge' => $min_charge
         ],
         [
             'batch_no' => $batch_no,
             'property_uuid' => $property_uuid,
             'start_date' => $start_date,
             'end_date' => $end_date,
             'type' => $type,
             'value' => $rate,
             'min_charge' => $min_charge
         ]
      );
   }

   public function destroy($batch_no, $property_uuid){
      UtilityParameter::where('batch_no', $batch_no)->where('property_uuid', $property_uuid)->delete();
   }
}
