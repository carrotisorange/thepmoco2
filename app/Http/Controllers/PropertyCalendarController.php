<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyCalendarController extends Controller
{
    public function index(Property $property){
        return view('properties.calendars.index',[
            'property' => $property,
        ]);
    }
}
