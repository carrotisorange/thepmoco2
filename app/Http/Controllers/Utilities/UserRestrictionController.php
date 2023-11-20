<?php

namespace App\Http\Controllers\Utilities;

use Session;
use App\Http\Controllers\Controller;
use App\Models\{Property,Type,Restriction,UserRestriction};

class UserRestrictionController extends Controller
{
    public function storeOrUpdateFeatureRestrictions($propertyUuid){

        $propertyTypeId = Property::find($propertyUuid)->type_id;

        $features = Type::where('id', $propertyTypeId)->pluck('features')->first();

        $featuresArray = explode(",", $features);

        foreach($featuresArray as $feature){
            for ($restrictionId=1; $restrictionId<=Restriction::all()->count(); $restrictionId++) {
                UserRestriction::firstOrCreate(
                [
                 'feature_id' => (int) $feature,
                 'user_id' => auth()->user()->id,
                 'property_uuid' => $propertyUuid,
                 'restriction_id' => $restrictionId
                ],
                [
                 'feature_id' => (int) $feature,
                 'user_id' => auth()->user()->id,
                 'property_uuid' => $propertyUuid,
                 'restriction_id' => $restrictionId,
                 'is_approved' => 1,
                ]
                );
            }
        }
    }

    public function isFeatureAuthorized($featureId, $restrictionId){
        return UserRestriction::where('property_uuid', Session::get('property_uuid'))
         ->where('user_id', auth()->user()->id)
         ->where('feature_id', $featureId)
         ->where('restriction_id', $restrictionId)
         ->pluck('is_approved')
         ->first() === 1;
    }
}
