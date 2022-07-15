<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardSalesController extends Controller
{
    public function index()
    {

        return view('dashboard.sales.index',[
            'users' => User::where('role_id', '5')->orderBy('id')->get()
        ]);
    }

    public function show($id)
    {
        return view('dashboard.sales.show',[
            'properties'=>User::find(auth()->user()->id)->user_properties,
            'user' => User::find($id)
        ]);
    }
}
