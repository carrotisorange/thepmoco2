<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Property;
use App\Models\Unit;
use Session;

class OwnerDeedOfSalesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, Unit $unit, Owner $owner)
    {
        return view('owners.deed_of_sale.index',[
            'owner' => Owner::find($owner->uuid),
            'deed_of_sales' => Owner::find($owner->uuid)->deed_of_sales
        ]);
    }

    public function show_deed_of_sales($owner_uuid)
    {
        return Owner::find($owner_uuid)->deed_of_sales;
    }

    public function create(Property $property, Owner $owner)
    {
        Session::put('owner_uuid', $owner->uuid);
        
        return view('units.index');
    }
}
