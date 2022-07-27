<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Unit;

class UnitEnrolleeController extends Controller
{
    public function index(Property $property, Unit $unit)
    {
        return view('units.enrollees.index',[
                'unit' => Unit::find($unit->uuid),
                'enrollees' => Unit::find($unit->uuid)->enrollees,
        ]);
    }
}
