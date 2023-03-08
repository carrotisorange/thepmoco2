<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Owner;
use Session;

class PropertyOwnerController extends Controller
{
    public function index(Property $property){

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',4);

        return view('properties.owners.index');
    }

    public function unlock(Property $property)
    {
        return view('admin.restrictedpages.ownerportal');
    }

    public function show(Property $property, Owner $owner)
    {
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens one',2);

        Session::forget('tenant_uuid');

        return view('owners.show',[
            'owner_details' => $owner,
        ]);
    }

}
