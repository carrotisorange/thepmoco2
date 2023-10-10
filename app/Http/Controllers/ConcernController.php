<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use Illuminate\Http\Request;
use Session;
use App\Models\Property;
use App\Models\ConcernCategory;

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

      // $this->authorize('is_concern_delete_allowed');

        Concern::where('unit_uuid', $unit_uuid)->delete();
    }

    // public function getConcerns($property_uuid, $status, $duration)
    // {
    //     return Concern::where('property_uuid',$property_uuid)
    //     ->when($status, function ($query) use ($status) {
    //       $query->where('status', $status);
    //     })
    //      ->when($duration, function ($query) use ($duration) {
    //        $query->whereMonth('created_at', $duration);
    //     })
    //     ->orderBy('created_at', 'desc');
    // }

    public function getConcerns($property_uuid)
    {
        return Property::find($property_uuid)->concerns();
    }

    public function create()
    {
       // $this->authorize('is_concern_create_allowed');

        return view('tenants.concerns.create');
    }

    public function show($property_uuid, Concern $concern)
    {
        //$this->authorize('is_concern_read_allowed');

        //$this->authorize('is_concern_update_allowed');

        app('App\Http\Controllers\ActivityController')->store(Session::get('property_uuid'), auth()->user()->id,'opens one',13);

        return view('concerns.show',[
            'concern' => $concern
        ]);
    }

    public function edit(Property $property, Concern $concern)
    {
        app('App\Http\Controllers\ActivityController')->store(Session::get('property_uuid'), auth()->user()->id,'opens one',13);

        return view('tenants.concerns.edit',[
            'concern' => $concern,
        ]);
    }

}
