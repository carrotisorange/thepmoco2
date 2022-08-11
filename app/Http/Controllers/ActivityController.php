<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends Controller
{
    public function store($property_uuid, $user_id, $description, $activity_type)
    {
        Activity::create([
            'property_uuid' => $property_uuid,
            'user_id' => $user_id,
            'activity_type_id' => $activity_type,
            'description' => $description
        ]);
    }

}
