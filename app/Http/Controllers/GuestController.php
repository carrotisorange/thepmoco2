<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Unit;
use Carbon\Carbon;
use DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show_unit_guests($unit_uuid)
    {
       return Guest::join('units', 'unit_uuid', 'units.uuid')
       ->where('unit_uuid', $unit_uuid)
       ->orderBy('guests.created_at', 'asc')
       ->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property, Unit $unit)
    {
        return view('guests.create', [
            'unit' => $unit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($guest_uuid, $unit_uuid, $guest, $email, $mobile_number, $movein_at, $moveout_at)
    {
        Guest::create([
            'uuid' => $guest_uuid,
            'unit_uuid' => $unit_uuid,
            'guest' => $guest,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'movein_at' => $movein_at,
            'moveout_at' => $moveout_at
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function movein(Property $property, Unit $unit, Guest $guest)
    {
        Guest::where('uuid', $guest->uuid)
        ->update([
            'status' => 'active',
            'movein_at' => Carbon::now()
        ]);

        return redirect('/property/'.$property->uuid.'/unit/'.$unit->uuid)->with('success', 'Guest has been moved in successfully!');
    }

    public function moveout(Property $property, Unit $unit, Guest $guest)
    {      
        Guest::where('uuid', $guest->uuid)
        ->update([
            'status' => 'inactive',
            'moveout_at' => Carbon::now()
        ]);

        return redirect('/property/'.$property->uuid.'/unit/'.$unit->uuid)->with('success', 'Guest has been moved in successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
