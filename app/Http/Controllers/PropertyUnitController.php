<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;
use Illuminate\Support\Str;

class PropertyUnitController extends Controller
{
    public function index(Property $property, $action=null)
    {   
        Session::forget('tenant_uuid');

        Session::forget('owner_uuid');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',2);

        return view('properties.units.index');
    }
}
