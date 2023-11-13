<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\{Point,User};

class PointController extends Controller
{
    public function index(User $user)
    {
        $points = User::find($user->id)->points()->paginate(10);

        return view('points.index',[
            'points' => $points
        ]);
    }

    public function store($property_uuid, $user_id, $point, $action_id)
    {
          Point::create([
          'user_id' => $user_id,
          'point' => $point,
          'action_id' => $action_id,
          'property_uuid' => $property_uuid
          ]);
    }
}
