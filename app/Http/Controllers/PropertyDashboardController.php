<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Session;
use App\Models\UserRestriction;

class PropertyDashboardController extends Controller
{
    public function index(Property $property)
    {        
        if(!app('App\Http\Controllers\UserRestrictionController')->isRestricted(1)){
            return abort(403);
        }
        
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',1);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.dashboard.index',[
            'property' => $property,
        ]); 
    }

 
}
