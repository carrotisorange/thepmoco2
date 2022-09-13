<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use Illuminate\Http\Request;
use Session;
use App\Models\Property;

class ConcernController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concerns = Property::find(Session::get('property'))->concerns;

         return view('concerns.index',[
         'concerns'=> $concerns,
         ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function show(Concern $concern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function edit(Concern $concern)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concern $concern)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concern $concern)
    {
        //
    }
}
