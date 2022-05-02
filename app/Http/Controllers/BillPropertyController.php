<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Property;

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
        $bill_count_min = Property::find($property_uuid)->bills->min('id');
        $bill_count_max = Property::find($property_uuid)->bills->max('id');

        // for($i=$bill_count; $i>=1; $i--){
        //     Bill::create([
        //     'uuid' => Str::uuid(),
        //     'unit' => 'Unit '.$i,
        //     'building_id' => '1',
        //     'floor_id' => '1',
        //     'property_uuid' => $property_uuid,
        //     'user_id' => auth()->user()->id,
        //     'batch_no' => $batch_no
        // ]);
        // }
    }
}
