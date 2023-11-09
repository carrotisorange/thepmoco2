<?php

namespace App\Http\Controllers;

use App\Models\{Property,Unit,Concern};

class UnitConcernController extends Controller
{
    public function index(Property $property, Unit $unit)
    {
        return view('features.units.concerns.index',[
            'unit' => $unit,
            'concerns' => Unit::find($unit->uuid)->concerns
        ]);
    }

    public function create(Property $property, Unit $unit)
    {
        return view('features.units.concerns.create',[
            'unit' => $unit
        ]);
    }

    public function edit(Property $property, Unit $unit, Concern $concern)
    {
        return view('features.units.concerns.edit',[
        'unit' => $unit,
        'concern' => $concern,
        ]);
    }

}
