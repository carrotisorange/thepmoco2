<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;
use App\Models\Utility;

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
          'view' => 'listView'
         ]);
    }

    public function create(Property $property, Unit $unit, $type, Utility $utility){
        return view('units.bills.create',[
            'property' => $property,
            'unit' => $unit, 
            'type' => $type,
            'utility' => $utility
        ]);
    }
}
