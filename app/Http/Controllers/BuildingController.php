<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\PropertyBuilding;
use Illuminate\Http\Request;
use Session;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    //   if($property_building)
    //   {
    //     return back()->with('error', 'Building already exists.');
    //   }

    //    if($building){

    //         PropertyBuilding::create([
    //         'building_id' => $property_building,
    //         'property_uuid' => Session::get('property')
    //         ]);

    //         return back()->with('success', 'New building is successfully created.');
    //     }
    //     else{
            
            $building_id = Building::create($attributes)->id;

            PropertyBuilding::create([
                'building_id' => $building_id,
                'property_uuid' => Session::get('property')
            ]);

            return back()->with('success', 'Building is successfully created.');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        //
    }
}
