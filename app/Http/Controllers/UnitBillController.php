<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitBillController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Unit $unit)
    {
         return view('units.bills.index',[
         'unit' => Unit::find($unit->uuid),
         'bills' => Unit::find($unit->uuid)->bills,
         ]);
    }
}
