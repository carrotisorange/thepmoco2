<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Guest;

class PropertyGuestController extends Controller
{
    public function index(Property $property){

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',22);

        return view('properties.guests.index',[
            'property' => $property
        ]);
    }

    public function destroy($unit_uuid){
        Guest::where('unit_uuid', $unit_uuid)->delete();
    }
    
}
