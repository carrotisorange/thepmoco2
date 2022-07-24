<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Property;
use Session;

class OwnerDeedOfSalesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, Owner $owner)
    {
        return view('owners.deed_of_sales.index',[
            'owner' => Owner::find($owner->uuid),
            'deed_of_sales' => Owner::find($owner->uuid)->deed_of_sales
        ]);
    }

    public function create(Property $property, Owner $owner)
    {
        Session::put('owner_uuid', $owner->uuid);
        
        return view('units.index');
    }
}
