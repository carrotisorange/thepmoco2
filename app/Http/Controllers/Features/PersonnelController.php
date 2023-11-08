<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\UserProperty;
use Session;

class PersonnelController extends Controller
{
    public function index(Property $property)
    {
        $featureId = 9;

        $restrictionId = 2;

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id, $restrictionId, $featureId);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        $propertyVerifiedPersonnelsCount = UserProperty::where('property_uuid',Session::get('property_uuid'))
        ->join('users','user_properties.user_id', 'users.id')
        ->where('users.email_verified_at', false)
        ->where('user_properties.role_id','!=', 5)
        ->count();

        // if($propertyVerifiedPersonnelsCount == 0){
        //     return redirect('/property/'.Session::get('property_uuid').'/congratulations');
        // }else{
                return view('properties.personnels.index',[
                'users' => app('App\Http\Controllers\UserPropertyController')->getPersonnels($property->uuid,auth()->user()->id),
                'properties' => app('App\Http\Controllers\UserPropertyController')->get_user_properties($property->uuid,auth()->user()->id),
                'property' => $property
            ]);
        // }


    }

    public function getPersonnels($property_uuid)
    {
        return Property::find($property_uuid)->property_users()->get();
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
        app('App\Http\Controllers\UserPropertyController')->store($property_uuid,$user_id,false,false);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }
}

