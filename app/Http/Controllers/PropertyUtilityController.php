<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;
use App\Models\Utility;

class PropertyUtilityController extends Controller
{
    public function index(Property $property)
    {
        app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id,'opens',21);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.utilities.index');
    }

    public function destroy($unit_uuid){
        Utility::where('unit_uuid', $unit_uuid)->delete();
    }
}
