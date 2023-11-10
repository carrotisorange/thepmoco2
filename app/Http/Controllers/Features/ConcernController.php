<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Session;
use App\Models\{Concern, Property};

class ConcernController extends Controller
{

    public function index(Property $property)
    {
        $featureId = 10;

        $restrictionId = 2;

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,$restrictionId,$featureId);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.concerns.index',[
            'property' => $property
        ]);
    }

    public function destroy($unit_uuid){

        Concern::where('unit_uuid', $unit_uuid)->delete();
    }


    public function getConcerns($property_uuid)
    {
        return Property::find($property_uuid)->concerns();
    }

    public function create()
    {
       // $this->authorize('is_concern_create_allowed');

        return view('features.concerns.create');
    }

    public function show($property_uuid, Concern $concern)
    {
        //$this->authorize('is_concern_read_allowed');

        //$this->authorize('is_concern_update_allowed');

        app('App\Http\Controllers\ActivityController')->store(Session::get('property_uuid'), auth()->user()->id,'opens one',13);

        return view('features.concerns.show',[
            'concern' => $concern
        ]);
    }

    public function edit(Property $property, Concern $concern)
    {
        app('App\Http\Controllers\ActivityController')->store(Session::get('property_uuid'), auth()->user()->id,'opens one',13);

        return view('features.tenants.concerns.edit',[
            'concern' => $concern,
        ]);
    }

}
