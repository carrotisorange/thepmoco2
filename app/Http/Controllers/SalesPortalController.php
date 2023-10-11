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

    public function property($role_id, $username, $user_id)
    {
        $properties = User::findOrFail($user_id)->user_properties()->whereNotNull('user_id')->orWhereNotNull('property_uuid')->get();

        // ddd($properties);

        return view('portals.sales.properties',[
            'properties'=> $properties,
            'user' => User::find($user_id)
        ]);
    }

    public function session()
    {
        return view('portals.sales.sessions',[
            'sessions'=>DB::table('sessions')->whereDate('created_at', Carbon::now())->orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->get()
        ]);
    }

//    return view('portals.sales.sessions',[
//    'sessions'=>DB::table('sessions')
//    ->join('users', 'sessions.user_id', 'users.id')
//    ->join('user_properties', 'users.id', 'user_properties.user_id')
//    ->join('roles', 'user_properties.role_id', 'roles.id')
//    ->whereDate('sessions.created_at', Carbon::now())
//    ->where('category','end-user')
//    ->groupBy('sessions.user_id')
//    ->orderBy('sessions.created_at', 'desc')->orderBy('sessions.updated_at', 'desc')->get()
//    ]);
}
