<?php

namespace App\Http\Controllers;

use App\Models\UnitInventory;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Unit;
use Illuminate\Support\Str;

class UnitInventoryController extends Controller
{
    public function create(Property $property, Unit $unit){

        $batch_no = Str::random(8);

        $current_inventory = UnitInventory::where('unit_uuid', $unit->uuid)->count();

        if(!$current_inventory){
        UnitInventory::create(
            [
                'unit_uuid' => $unit->uuid,
                'user_id' => auth()->user()->id,
                'batch_no' => $batch_no
            ]
        );
        }

        return view('inventories.create',[
            'unit' => $unit,
            'batch_no' => $batch_no,
        ]);
    }
}
