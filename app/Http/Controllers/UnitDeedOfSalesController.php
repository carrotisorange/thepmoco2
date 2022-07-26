<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Property;

class UnitDeedOfSalesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, Unit $unit)
    {
         return view('units.deed_of_sales.index',[
         'unit' => Unit::find($unit->uuid),
         'deed_of_sales' => Unit::find($unit->uuid)->deed_of_sales,
         ]);
    }
}
