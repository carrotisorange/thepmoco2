<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Session;
use App\Models\Unit;

class PropertyUnitController extends Controller
{
    public function index(Property $property, $batch_no=null)
    {   
        Session::forget('tenant_uuid');

        Session::forget('owner_uuid');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',2);

        return view('properties.units.index',[
            'property' => $property,
            'batch_no' => $batch_no
        ]);
    }

    public function destroy($unit_uuid){
        Unit::where('uuid', $unit_uuid)->delete();
    }
}