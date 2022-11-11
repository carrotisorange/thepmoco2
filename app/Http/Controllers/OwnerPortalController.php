<?php

namespace App\Http\Controllers;

use App\Models\AcknowledgementReceipt;
use App\Models\User;
use App\Models\Owner;
use App\Models\Bill;

class OwnerPortalController extends Controller
{
    public function index($role_id, User $user)
    {
        return view('portal.owners.index',[
            'owner' => Owner::findOrFail($user->owner_uuid)->owner,
            'units' => Owner::findOrFail($user->owner_uuid)->enrollees
        ]);
    }

    public function show_units($role_id, User $user)
    {
        return view('portal.owners.units',[
            'units' => Owner::findOrFail($user->owner_uuid)->deed_of_sales
        ]);
    }

    public function show_bills($role_id, User $user)
    {
        return view('portal.owners.bills',[
            'bills' => Owner::findOrFail($user->owner_uuid)->bills
        ]);
    }

    public function show_payments($role_id, User $user)
    {
        return view('portal.owners.payments',[
          'units' => Owner::findOrFail($user->owner_uuid)->bills
        ]);
    }

    public function show_concerns($role_id, User $user)
    {
        return view('portal.owners.concerns',[
            'units' => Owner::findOrFail($user->owner_uuid)->bills
        ]);
    }
}
