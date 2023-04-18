<?php

namespace App\Http\Controllers;

use App\Models\Property;

class PropertyDashboardController extends Controller
{
    public function index(Property $property)
    {        
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',1);

        $this->authorize('is_portfolio_read_allowed');

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.dashboard.index',[
            'property' => $property,
        ]); 
    }

 
}
