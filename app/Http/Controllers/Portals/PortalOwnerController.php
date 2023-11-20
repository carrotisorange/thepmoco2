<?php

namespace App\Http\Controllers\Portals;

use App\Http\Controllers\Controller;
use App\Models\{User,Owner,DeedOfSale,Bulletin,Unit};

class PortalOwnerController extends Controller
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

    public function show_bulletin($role_id, User $user)
    {
        $owner_uuid = User::where('id', auth()->user()->id)->value('owner_uuid');

        $property_uuid = DeedOfSale::where('owner_uuid', $owner_uuid)->value('property_uuid');

        return view('portals.owners.bulletins',[
            'bulletins' => Bulletin::where('property_uuid', $property_uuid)->where('is_approved',1)->orderBy('id','desc')->get()
        ]);
    }

     public function show_guests($role_id, User $user, Unit $unit)
    {
        return view('portals.owners.guests',[
            'guests' => Unit::findOrFail($unit->uuid)->guests,
            'unit' => $unit,
        ]);
    }


    public function show_bills($role_id, User $user)
    {
        return view('portals.owners.bills',[
            'bills' => Owner::findOrFail($user->owner_uuid)->bills,
            'view' => 'listView',
            'isPaymentAllowed' => false
        ]);
    }

    public function show_payments($role_id, User $user)
    {
        return view('portals.owners.payments',[
          'collections' => Owner::findOrFail($user->owner_uuid)->collections
        ]);
    }

    public function show_remittances($role_id, User $user)
    {
        return view('portals.owners.remittances',[
          'remittances' => Owner::findOrFail($user->owner_uuid)->remittances
        ]);
    }

    public function show_concerns($role_id, User $user)
    {
        return view('portals.owners.concerns',[
            'units' => Owner::findOrFail($user->owner_uuid)->bills
        ]);
    }
}
