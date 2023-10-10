<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProperty;
use DB;
use Carbon\Carbon;

class SalesPortalController extends Controller
{
    public function signup()
    {
        return view('portals.sales.signups',[
            'signups' => User::where('role_id', '5')->orderBy('id', 'desc')->paginate(10)
        ]);
    }

    public function personnel()
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

    public function session()
    {
        return view('portals.sales.sessions',[
            'sessions'=>DB::table('sessions')->whereDate('created_at', Carbon::now())->orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->get()
        ]);
    }

    // public function login(User $user){
    //     ddd('asdasd');
    // }
}
