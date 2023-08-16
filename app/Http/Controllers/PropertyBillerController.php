<?php

namespace App\Http\Controllers;

use App\Models\PropertyBiller;
use Illuminate\Http\Request;
use Session;

class PropertyBillerController extends Controller
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
        PropertyBiller::create([
            'biller' => $request->biller,
            'property_uuid' => Session::get('property_uuid')
        ]);

        return back()->with('success', 'Success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyBiller  $propertyBiller
     * @return \Illuminate\Http\Response
     */
    public function show($property_uuid)
    {
        return PropertyBiller::where('property_uuid', $property_uuid)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyBiller  $propertyBiller
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyBiller $propertyBiller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyBiller  $propertyBiller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyBiller $propertyBiller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyBiller  $propertyBiller
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyBiller $propertyBiller)
    {
        //
    }
}
