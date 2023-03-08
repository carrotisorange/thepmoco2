<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Property;
use App\Models\User;
use Session;
use App\Models\AcknowledgementReceipt;
use App\Models\Guest;

class OwnerController extends Controller
{

    public function show_owner_collections($owner_uuid)
    {
       return AcknowledgementReceipt::where('owner_uuid', $owner_uuid)->orderBy('id','desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property, Unit $unit)
    {
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
    public function store(Request $request, Property $property, $unit_uuid)
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
  

    public function show_owner_representatives($owner_uuid)
    {
        return Owner::find($owner_uuid)->representatives()->paginate(5);
    }

    public function show_owner_banks($owner_uuid)
    {
        return Owner::find($owner_uuid)->banks()->paginate(5);
    }

    public function show_owner_deed_of_sales($owner_uuid)
    {
        return Owner::find($owner_uuid)->deed_of_sales()->paginate(5);
    }

    public function show_owner_enrollees($owner_uuid)
    {
        return Owner::find($owner_uuid)->enrollees()->paginate(5);
    }

    public function show_owner_spouses($owner_uuid)
    {
        return Owner::find($owner_uuid)->spouses()->paginate(5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
       
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
    public function destroy(Property $property, Unit $unit, Owner $owner)
    {
        Owner::where('uuid', $owner->uuid)->delete();

        User::where('email', $owner->email)->delete();

        return redirect('/property/'.$property->uuid.'/unit/'.$unit->uuid.'/owner/'.Str::random(8).'/create');

    }
}
