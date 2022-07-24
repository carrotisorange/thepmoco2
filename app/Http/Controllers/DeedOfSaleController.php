<?php

namespace App\Http\Controllers;

use App\Models\DeedOfSale;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Owner;
use App\Models\Property;

class DeedOfSaleController extends Controller
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
    public function create(Property $property, Unit $unit, Owner $owner)
    {
        return view('deed_of_sales.create',[
            'unit' => $unit,
            'owner' => $owner
        ]);
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
     * @param  \App\Models\DeedOfSale  $deedOfSale
     * @return \Illuminate\Http\Response
     */
    public function show(DeedOfSale $deedOfSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeedOfSale  $deedOfSale
     * @return \Illuminate\Http\Response
     */
    public function edit(DeedOfSale $deedOfSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeedOfSale  $deedOfSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeedOfSale $deedOfSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeedOfSale  $deedOfSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeedOfSale $deedOfSale)
    {
        //
    }
}
