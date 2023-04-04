<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\UserProperty;

class PropertyDashboardController extends Controller
{
    public function index(Property $property)
    {        
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',1);

        $this->authorize('is_portfolio_read_allowed');

        $this->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.dashboard.index',[
            'property' => $property,
        ]); 
    }

    public function isUserApproved($user_id, $property_uuid){
        $user = UserProperty::where('user_id', $user_id)
        ->where('property_uuid', $property_uuid)
        ->get('is_approve');

        if($user->toArray()[0]['is_approve'] == '0'){
           return abort(401);
        }
    }
}
