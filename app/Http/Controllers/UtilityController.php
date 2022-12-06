<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use Illuminate\Http\Request;
use App\Models\Property;
use Session;

class UtilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    { 
        app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id,'opens',21);
        
        return view('utilities.index');
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
    public function store($property_uuid, $unit_uuid, $user_id, $start_date, $end_date, $batch_no, $option)
    {
        Utility::create([
            'property_uuid' => $property_uuid,
            'unit_uuid' => $unit_uuid,
            'user_id' => $user_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'batch_no' => $batch_no,
            'type' => $option
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function show(Utility $utility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function edit($property_uuid, $batch_no, $option)
    {
       return view('utilities.edit',[
            'batch_no' => $batch_no,
            'option' => $option
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utility $utility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utility  $utility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utility $utility)
    {
        //
    }
}
