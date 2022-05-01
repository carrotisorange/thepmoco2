<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Country;
use App\Models\Enrollee;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('owners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unit $unit)
    {
        $this->authorize('manager');

        return view('owners.create', [
            'unit' => $unit,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $unit_uuid)
    {
         $owner_attributes = request()->validate([
         'owner' => 'required',
         'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
         'mobile_number' => 'required',
         'gender' => 'required',
         'civil_status' => 'required',
         'birthdate' => 'required',
         'country_id' => ['required', Rule::exists('countries', 'id')],
         'province_id' => ['required', Rule::exists('provinces', 'id')],
         'city_id' => ['required', Rule::exists('cities', 'id')],
         ]);

         $owner_attributes['uuid'] = Str::uuid();

         $owner = Owner::create($owner_attributes)->uuid;

         return redirect('/unit/'.$unit_uuid.'/owner/'.$owner.'/enrollee/'.Str::random(8).'/create')->with('success',
         'Owner has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('owners.show',[
            'owner' => $owner,
            'deed_of_sales' => Owner::find($owner->uuid)->deed_of_sales,
            'enrollees' => Owner::find($owner->uuid)->enrollees,
            'representatives' => Owner::find($owner->uuid)->representatives,
            'banks' => Owner::find($owner->uuid)->banks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owners.edit',[
            'owner_details' => $owner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
