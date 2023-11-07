<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Property;
use App\Models\User;
use Session;
use App\Models\AcknowledgementReceipt;
use App\Models\House;

class OwnerController extends Controller
{

    public function index(Property $property){

        $featureId = 8;

        $restrictionId = 2;

        if(!app('App\Http\Controllers\UserRestrictionController')->isFeatureRestricted($featureId, auth()->user()->id)){
            return abort(403);
        }

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,$restrictionId,$featureId);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.owners.index');
    }

    public function unlock(Property $property)
    {
        return view('admin.restrictedpages.ownerportal');
    }

    public function show(Property $property, Owner $owner)
    {
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens one',2);

        Session::forget('tenant_uuid');

        return view('features.owners.show',[
            'property' => $property,
            'owner_details' => $owner,
        ]);
    }

    public function show_owner_collections($owner_uuid)
    {
       return AcknowledgementReceipt::where('owner_uuid', $owner_uuid)->orderBy('id','desc')->get();
    }

    public function create(Property $property, Unit $unit)
    {
        return view('features.owners.create', [
            'unit' => $unit,
        ]);
    }

    public function show_owner_representatives($owner_uuid)
    {
        return Owner::find($owner_uuid)->representatives()->paginate(5);
    }

    public function show_owner_banks($owner_uuid)
    {
        return Owner::find($owner_uuid)->banks()->paginate(5);
    }

    public function show_owner_deed_of_sales($owner_uuid)
    {
        return Owner::find($owner_uuid)->deed_of_sales()->paginate(5);
    }

    public function show_owner_spouses($owner_uuid)
    {
        return Owner::find($owner_uuid)->spouses()->paginate(5);
    }

    public function destroy(Property $property, Unit $unit, Owner $owner)
    {
        Owner::where('uuid', $owner->uuid)->delete();

        User::where('email', $owner->email)->delete();

        return redirect('/property/'.$property->uuid.'/unit/'.$unit->uuid.'/owner/'.Str::random(8).'/create');

    }


}
