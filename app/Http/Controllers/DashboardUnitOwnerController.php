<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Owner;

class DashboardUnitOwnerController extends Controller
{
    public function index(User $user)
    {
        return view('portal.owners.index',[
            'tenant' => Owner::findOrFail($user->tenant_uuid)->owner
        ]);
    }
}
