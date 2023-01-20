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
        return view('portals.owners.index',[
            'owner' => Owner::findOrFail($user->owner_uuid)->owner,
            'units' => Owner::findOrFail($user->owner_uuid)->enrollees
        ]);
    }

    public function show_units($role_id, User $user)
    {
        return view('portals.owners.units',[
            'units' => Owner::findOrFail($user->owner_uuid)->deed_of_sales
        ]);
    }

    public function show_bills($role_id, User $user)
    {
        return view('portals.owners.bills',[
            'bills' => Owner::findOrFail($user->owner_uuid)->bills,
            'view' => 'listView'
        ]);
    }

    public function show_payments($role_id, User $user)
    {
        return view('portals.owners.payments',[
          'collections' => Owner::findOrFail($user->owner_uuid)->collections
        ]);
    }

    public function show_concerns($role_id, User $user)
    {
        return view('portals.owners.concerns',[
            'units' => Owner::findOrFail($user->owner_uuid)->bills
        ]);
    }
}
