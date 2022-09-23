<?php

namespace App\Http\Controllers;

use App\Models\AcknowledgementReceipt;
use App\Models\User;
use App\Models\Owner;

class OwnerPortalController extends Controller
{
    public function index($role_id, User $user)
    {
        return view('portal.owners.index',[
            'owner' => Owner::findOrFail($user->owner_uuid)->owner
        ]);
    }

    public function show_units($role_id, User $user)
    {
        return view('portal.owners.index',[
            'owner' => Owner::findOrFail($user->owner_uuid)->owner
        ]);
    }

    public function show_bills($role_id, User $user)
    {
        return view('portal.owners.bills',[
            'owner' => Owner::findOrFail($user->owner_uuid)->owner
        ]);
    }

    public function show_payments($role_id, User $user)
    {
        return view('portal.owners.payments',[
            'owner' => Owner::findOrFail($user->owner_uuid)->owner
        ]);
    }

    public function show_concerns($role_id, User $user)
    {
        return view('portal.owners.concerns',[
            'owner' => Owner::findOrFail($user->owner_uuid)->owner
        ]);
    }
}
