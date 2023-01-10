<?php

namespace App\Http\Controllers;

use App\Models\UnitInventory;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Unit;

class UnitInventoryController extends Controller
{
    public function create(Property $property, Unit $unit){
        return view('inventories.create',[
            'unit' => $unit
        ]);
    }
}
