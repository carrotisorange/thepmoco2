<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\House;
use App\Models\HouseOwner;

class HouseOwnerController extends Controller
{
    public function index(Property $property){

        $featureId = 25;

        $restrictionId = 2;

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,$restrictionId,$featureId);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('house-owners.index');
    }

    public function create(Property $property, House $house){
        return view('house-owners.create',[
            'house' => $house
        ]);
    }

    public function show(Property $property, HouseOwner $houseOwner){
        return view('house-owners.show',[
            'house_owner_details' => $houseOwner
        ]);
    }
}
