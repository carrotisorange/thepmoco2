<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyPersonnelController extends Controller
{
    public function index(Property $property)
    {
        //restrict access to account owner 
        $this->authorize('accountowner');
            
        //store a new activity
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id, 'opens', 8);

        return view('properties.personnels.index',[
            'users' => app('App\Http\Controllers\UserPropertyController')->get_property_users($property->uuid,auth()->user()->id),
            'properties' => app('App\Http\Controllers\UserPropertyController')->get_user_properties($property->uuid,auth()->user()->id),
        ]);
    }
}
