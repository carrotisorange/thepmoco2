<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardSalesController extends Controller
{
    public function index()
    {
        return view('dashboard.sales.index',[
            'users' => User::where('role_id', '5')->orderBy('id', 'desc')->get()
        ]);
    }

    public function show_property(User $user)
    {
        return view('dashboard.sales.show-property',[
            'properties'=>User::find($user->id)->user_properties,
            'user' => User::find($user->id)
        ]);
    }

    public function show_activity(User $user)
    {
        return view('dashboard.sales.show-activity',[
            'activities'=>User::find($user->id)->activities,
            'user' => User::find($user->id)
        ]);
    }
}
