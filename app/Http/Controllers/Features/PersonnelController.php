<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Session;
use App\Models\{Property, UserProperty};

class PersonnelController extends Controller
{
    public function index(Property $property)
    {
        $featureId = 9; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId,
        $restrictionId)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($restrictionId, $featureId);

        return view('features.personnels.index',[
            'users' => app('App\Http\Controllers\Utilities\UserPropertyController')->getPersonnels($property->uuid,auth()->user()->id),
            'properties' => app('App\Http\Controllers\Utilities\UserPropertyController')->get_user_properties($property->uuid,auth()->user()->id),
            'property' => $property
        ]);
    }

    public function getPersonnels()
    {
        return UserProperty::where('property_uuid',Session::get('property_uuid'));
    }

    public function getVerifiedPersonnels(){
        return UserProperty::join('users', 'user_properties.user_id', 'users.id')
        ->where('property_uuid', Session::get('property_uuid'))
        ->whereNotNull('email_verified_at');
    }

    public function create(Property $property, $random_str)
    {
        $this->authorize('accountownerandmanager');

        return view('features.personnels.create',[
            'property' => $property
        ]);
    }

    public function delegate(Property $property, $user_id, $property_uuid)
    {
        app('App\Http\Controllers\Utilities\UserPropertyController')->store($property_uuid,$user_id,false,false);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }
}
