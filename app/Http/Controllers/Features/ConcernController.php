<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Session;
use DB;
use App\Models\{Concern, Property};

class ConcernController extends Controller
{
    public function index(Property $property)
    {
        $featureId = 10; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        return view('features.concerns.index');
    }

    public function get($status=null, $groupBy=null)
    {
        return Concern::getAll(Session::get('property_uuid'), $status, $groupBy);
    }

    public function getAverageNumberOfDaysForConcernsToBeResolved(){
        return Concern::where('property_uuid', Session::get('property_uuid'))
        ->select(DB::raw('avg(DATEDIFF(updated_at,created_at)) as total_number_of_days_to_be_resolved'))
        ->where('status', 'closed')
        ->value('total_number_of_days_to_be_resolved');
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

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity('opens one',13);

        return view('features.concerns.show',[
            'concern' => $concern
        ]);
    }

    public function edit(Property $property, Concern $concern)
    {
        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity('opens one',13);

        return view('features.tenants.concerns.edit',[
            'concern' => $concern,
        ]);
    }

}
