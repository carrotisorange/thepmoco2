<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        if($propertyVerifiedPersonnelsCount == 0){
            return redirect('/property/'.Session::get('property_uuid').'/congratulations');
        }else{
                return view('properties.personnels.index',[
                'users' => app('App\Http\Controllers\UserPropertyController')->getPersonnels($property->uuid,auth()->user()->id),
                'properties' => app('App\Http\Controllers\UserPropertyController')->get_user_properties($property->uuid,auth()->user()->id),
                'property' => $property
            ]);
        }


    }

    public function getPersonnels($property_uuid)
    {
        return Property::find($property_uuid)->property_users()->get();
    }
}
