<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyGuestController extends Controller
{
    public function index(Property $property){

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',22);

        return view('properties.guests.index',[
            'property' => $property
        ]);
    }
    
}
