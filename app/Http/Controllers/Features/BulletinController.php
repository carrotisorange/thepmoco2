<?php

namespace App\Http\Controllers\Features;
use App\Http\Controllers\Controller;

use App\Models\Property;

class BulletinController extends Controller
{
    public function index(Property $property){

        $featureId = 17; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId,$restrictionId)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        return view('features.bulletins.index');
    }
}
