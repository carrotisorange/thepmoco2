<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Owner;

class DashboardOwnerController extends Controller
{
    public function index(User $user)
    {
        return view('portal.owners.index',[
            'owner' => Owner::findOrFail($user->owner_uuid)->owner
        ]);
    }
}
