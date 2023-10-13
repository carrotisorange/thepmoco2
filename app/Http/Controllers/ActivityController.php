<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Carbon\Carbon;

class ActivityController extends Controller
{
    public function store($property_uuid, $user_id, $restriction_id, $feature_id)
    {
        Activity::create(
            // [
            //     'property_uuid' => $property_uuid,
            //     'user_id' => $user_id,
            //     'feature_id' => $feature_id,
            //     'restriction_id' => $restriction_id,
            //     // 'created_at' => Carbon::now()->format('Y-d-m').' '.'00:00:00'
            // ],
            [
                'property_uuid' => $property_uuid,
                'user_id' => $user_id,
                'feature_id' => $feature_id,
                'restriction_id' => $restriction_id,
            ]
    );
    }

}
