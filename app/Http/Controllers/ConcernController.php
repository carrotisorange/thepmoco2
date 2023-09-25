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
        if(!app('App\Http\Controllers\UserRestrictionController')->isRestricted(10)){
            return abort(403);
        }
         
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',13);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.concerns.index',[
            'property' => $property
        ]);
    }

    public function destroy($unit_uuid){

      // $this->authorize('is_concern_delete_allowed');

        Concern::where('unit_uuid', $unit_uuid)->delete();
    }
    
    public function get_property_concerns($property_uuid, $status, $duration)
    {
        return Concern::where('property_uuid',$property_uuid)
        ->when($status, function ($query) use ($status) {
          $query->where('status', $status);
        })
         ->when($duration, function ($query) use ($duration) {
           $query->whereMonth('created_at', $duration);
        })
        ->orderBy('created_at', 'desc');
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
