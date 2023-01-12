<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;

class PropertyUnitController extends Controller
{
    public function index(Property $property)
    {   
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',2);

        Session::forget('tenant_uuid');

        Session::forget('owner_uuid');

        return view('properties.units.index');
    }
}
