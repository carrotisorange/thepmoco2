<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Session;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function storeUserActivity($feature_id,$restriction_id)
    {
        Activity::create(
            [
                'property_uuid' => Session::get('property_uuid'),
                'user_id' => auth()->user()->id,
                'feature_id' => $feature_id,
                'restriction_id' => $restriction_id,
            ]
    );
    }

}
