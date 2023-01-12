<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;

class PropertyUtilityController extends Controller
{
    public function index(Property $property)
    {
     app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id,'opens',21);

     return view('properties.utilities.index');
    }
}
