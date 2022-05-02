<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class BillPropertyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($property_uuid, $bill_count)
    {
        for($i=$request->number_of_units; $i>=$bill_count; $i--){
            Bill::create([
            'uuid' => Str::uuid(),
            'unit' => 'Unit '.$i,
            'building_id' => '1',
            'floor_id' => '1',
            'property_uuid' => $property_uuid,
            'user_id' => auth()->user()->id,
            'batch_no' => $batch_no
        ]);
        }
    }
}
