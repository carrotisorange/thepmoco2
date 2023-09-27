<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Restriction;
use App\Models\UserRestriction;
use Session;

class UserRestrictionController extends Controller
{
    public function store($property_uuid, $user_id){
        for ($feature_id=1; $feature_id <=Feature::all()->count(); $feature_id++) { 
           for ($restriction_id=1; $restriction_id<=Restriction::all()->count() ; $restriction_id++ ) { 
            UserRestriction::firstOrCreate(
            [
              'feature_id' => $feature_id,
              'user_id' => $user_id,
              'property_uuid' => $property_uuid,
              'restriction_id' => $restriction_id
            ],
            [
              'feature_id' => $feature_id,
              'user_id' => $user_id,
              'property_uuid' => $property_uuid,
              'restriction_id' => $restriction_id,
              'is_approved' => 1,
            ]
            );
          }
        }
    }

    public function isRestricted($feature_id){
        return UserRestriction::where('property_uuid', Session::get('property_uuid'))
         ->where('user_id', auth()->user()->id)
         ->where('feature_id', $feature_id)
         ->where('restriction_id', 2)
         ->pluck('is_approved')
         ->first() === 1;
    }
}
