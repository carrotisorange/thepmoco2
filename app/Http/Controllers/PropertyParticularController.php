<?php

namespace App\Http\Controllers;

use App\Models\PropertyParticular;
use Illuminate\Http\Request;
use Session;
use App\Models\Particular;
use App\Models\Property;
use DB;


class PropertyParticularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($property)
    {
        return Particular::join('bills', 'particulars.id', 'bills.particular_id')
        ->select('particular','particulars.id as particular_id', DB::raw('count(*) as count'))
        ->where('bills.property_uuid', $property)
        ->groupBy('particulars.id')
        ->get();
    }

    public function show($property_uuid)
    {
        return Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', $property_uuid)
        ->get();
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
    public function store(Request $request, Property $property)
    {
        return 'asd';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyParticular  $propertyParticular
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyParticular  $propertyParticular
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyParticular $propertyParticular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyParticular  $propertyParticular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyParticular $propertyParticular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyParticular  $propertyParticular
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyParticular $propertyParticular)
    {
        //
    }
}
