<?php

namespace App\Http\Controllers;

use App\Models\DeedOfSale;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Owner;
use App\Models\Property;

class DeedOfSaleController extends Controller
{
    public function show_unit_deed_of_sales($unit_uuid)
    {
        return Unit::findOrFail($unit_uuid)->deed_of_sales()->paginate(5);
    }

    public function create(Property $property, Unit $unit, Owner $owner)
    {
        return view('deed_of_sales.create',[
            'unit' => $unit,
            'owner' => $owner
        ]);
    }
}
