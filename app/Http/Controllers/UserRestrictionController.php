<?php

namespace App\Http\Controllers;

use App\Models\Restriction;
use App\Models\UserRestriction;
use Session;
use App\Models\Property;
use App\Models\Type;

class UserRestrictionController extends Controller
{
    public function store($propertyUuid, $userId){

        $propertyTypeId = Property::find($propertyUuid)->type_id;

        $features = Type::where('id', $propertyTypeId)->pluck('features')->first();

        $featuresArray = explode(",", $features);

        foreach($featuresArray as $feature){
            for ($restrictionId=1; $restrictionId<=Restriction::all()->count(); $restrictionId++) {
                UserRestriction::firstOrCreate(
                [
                 'feature_id' => (int) $feature,
                 'user_id' => $userId,
                 'property_uuid' => $propertyUuid,
                 'restriction_id' => $restrictionId
            ],
                [
                 'feature_id' => (int) $feature,
                 'user_id' => $userId,
                 'property_uuid' => $propertyUuid,
                 'restriction_id' => $restrictionId,
                 'is_approved' => 1,
                ]
                );
            }
        }
    }

    public function isFeatureRestricted($featureId, $userId){
        return UserRestriction::where('property_uuid', Session::get('property_uuid'))
         ->where('user_id', $userId)
         ->where('feature_id', $featureId)
         ->where('restriction_id', 2)
         ->pluck('is_approved')
         ->first() === 1;
    }
}
