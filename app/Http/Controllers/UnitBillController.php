<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;

class UnitBillController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, Unit $unit)
    {
         return view('units.bills.index',[
         'unit' => $unit,
          'bills' => app('App\Http\Controllers\BillController')->show_unit_bills($unit->uuid),
         ]);
    }
}
