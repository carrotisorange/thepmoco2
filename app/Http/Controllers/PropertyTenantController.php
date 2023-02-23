<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;

class PropertyTenantController extends Controller
{
    public function index(Property $property)
    {
        
        Session::forget('action');

        //store activity for opening tenant page.
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',3);

        //retrieve all tenants associated to the current property.
        $tenants = app('App\Http\Controllers\PropertyController')->show_list_of_all_tenants($property->uuid);

        return view('properties.tenants.index',[
            'tenants'=>$tenants
        ]);
    }
}
