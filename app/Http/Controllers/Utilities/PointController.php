<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\{Point,User};
use Session;

class PointController extends Controller
{
    public function index(User $user)
    {
        $points = User::find($user->id)->points()->paginate(10);

        return view('points.index',[
            'points' => $points
        ]);
    }

    public function store($point, $action_id)
    {
          Point::create([
            'user_id' => auth()->user()->id,
            'point' => $point,
            'action_id' => $action_id,
            'property_uuid' => Session::get('property_uuid')
          ]);
    }
}
