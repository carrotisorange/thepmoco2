<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PersonnelController extends Controller
{
    public function index(Property $property)
    {
        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted(9, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id, 'opens', 8);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.personnels.index',[
            'users' => app('App\Http\Controllers\UserPropertyController')->getPersonnels($property->uuid,auth()->user()->id),
            'properties' => app('App\Http\Controllers\UserPropertyController')->get_user_properties($property->uuid,auth()->user()->id),
            'property' => $property
        ]);
    }

    public function getPersonnels($property_uuid)
    {
        return Property::find($property_uuid)->property_users()->get();
    }
}
