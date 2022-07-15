<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardSalesController extends Controller
{
    public function index()
    {
            // ::selectRaw('sum(point) as total, users.name as name')
            // ::join('users', 'user_properties.user_id', 'users.id')
            // ->join('properties', 'user_properties.property_uuid', 'properties.uuid')
            // ->where('role_id', 5)
            // ->groupBy('user_id')
            // ->get();

        return view('dashboard.sales.index',[
            'users' => User::where('role_id', '5')->orderBy('id')->get()
        ]);
    }
}
