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
        $featureId = 15;

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\ActivityController')->store(Session::get('property_uuid'), auth()->user()->id,'opens',$featureId);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.utilities.index');
    }

    public function destroy($unit_uuid){
        Utility::where('unit_uuid', $unit_uuid)->delete();
    }
}
