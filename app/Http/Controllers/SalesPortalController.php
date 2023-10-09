<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProperty;

class SalesPortalController extends Controller
{
    public function signup()
    {
        return view('portals.sales.signups',[
            'signups' => User::where('role_id', '5')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function user()
    {
        return view('portals.sales.personnels',[
            'personnels' => UserProperty::whereNotIn('role_id',['5'])->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function show_property(User $user)
    {
        return view('portals.sales.show-property',[
            'properties'=>User::find($user->id)->user_properties,
            'user' => User::find($user->id)
        ]);
    }

    public function activity(User $user)
    {
        return view('portals.sales.activities',[
            'activities'=>User::find($user->id)->activities,
            'user' => User::find($user->id)
        ]);
    }
}
