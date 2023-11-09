<?php

namespace App\Http\Controllers;

use Session;
use App\Models\{Owner,Property,Unit};

class OwnerDeedOfSalesController extends Controller
{
    public function index(Property $property, Unit $unit, Owner $owner)
    {
        return view('features.owners.deed_of_sale.index',[
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

          return view('features.units.index', [
            'property' => $property,
            'owner' => $owner,
            'batch_no' => '',
        ]);
    }
}
