<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends Controller
{
    public function store($property_uuid, $user_id, $restriction_id, $feature_id)
    {
        Activity::create(
            [
                'property_uuid' => $property_uuid,
                'user_id' => $user_id,
                'feature_id' => $feature_id,
                'restriction_id' => $restriction_id,
            ]
    );
    }

}
