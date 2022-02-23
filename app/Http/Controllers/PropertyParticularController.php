<?php

namespace App\Http\Controllers;

use App\Models\PropertyParticular;
use Illuminate\Http\Request;
use Session;

class PropertyParticularController extends Controller
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
         $particular = request()->validate([
         'particular_id'=> 'required',
         'minimum_charge' => 'required',
         'due_date' => 'required',
         'surcharge'=> 'required'
         ]);

         $particular['property_uuid'] = Session::get('property');

         $particular_id = PropertyParticular::create($particular)->id;

         return redirect('/property/'.Session::get('property').'/particulars')->with('success', 'A new particular has
         been added to the property.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyParticular  $propertyParticular
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyParticular $propertyParticular)
    {
        //
    }

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
