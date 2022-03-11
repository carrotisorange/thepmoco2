<?php

namespace App\Http\Controllers;

use App\Models\Enrollee;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\City;
use App\Models\Province;
use App\Models\Country;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Tenant;
use App\Models\Bill;
use App\Models\Property;
use App\Models\PropertyParticular;
use Session;
use DB;

class EnrolleeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $enrollees = Enrollee::leftJoin('units', 'enrollees.unit_uuid', 'units.uuid')
         ->leftJoin('owners', 'enrollees.owner_uuid', 'owners.uuid')
         ->leftJoin('buildings', 'units.building_id','buildings.id' )
         ->where('units.property_uuid', session('property'))
         ->groupBy('enrollees.uuid')
         ->paginate(10);

        return view('enrollees.index',[
            'enrollees' => $enrollees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unit $unit)
    {
        $cities = City::all();
        $provinces = Province::all();
        $countries = Country::all();

        return view('enrollees.create', [
        'uuid' => $unit->uuid,
        'unit' => $unit,
        'cities' => $cities,
        'provinces' => $provinces,
        'countries' => $countries
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
     * @param  \App\Models\Enrollee  $enrollee
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollee $enrollee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Enrollee $enrollee
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollee $enrollee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Enrollee $enrollee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollee $enrollee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Enrollee $enrollee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollee $enrollee)
    {
        //
    }
}
