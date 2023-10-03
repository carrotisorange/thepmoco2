<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\PropertyBuilding;
use Illuminate\Http\Request;
use App\Models\Property;
use Session;

class BuildingController extends Controller
{
    public function store(Request $request, Property $property)
    {
        $attributes = request()->validate([
            'building'=> 'required|max:255'
        ]);

        $building = Building::
          where('building', strtolower($request->building))
          ->pluck('id')
          ->first();

       $property_building = PropertyBuilding::
        where('building_id', $building)
       ->pluck('id')
       ->first();

            
            $building_id = Building::create($attributes)->id;

            PropertyBuilding::create([
                'building_id' => $building_id,
                'property_uuid' => Session::get('property_uuid')
            ]);

            return back()->with('success', 'Changes Saved!');
        // }
    }
}
