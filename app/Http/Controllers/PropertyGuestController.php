<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Guest;
use App\Models\Unit;
use Carbon\Carbon;

class PropertyGuestController extends Controller
{
    public function index(Property $property){

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',22);

        return view('properties.guests.index',[
            'property' => $property
        ]);
    }

    public function show (Property $property, Guest $guest){
        return view('properties.guests.show', [
            'property' => $property,
            'guest_details' => $guest
        ]);
    }

    public function show_bills(Property $property, Guest $guest){
        return view('properties.guests.show-bills',[
            'property' => $property,
            'guest' => $guest,
        ]);
    }
    
    public function store_collections(Property $property, Guest $guest, $batch_no){
        return view('properties.guests.store-collections',[
            'property' => $property, 
            'guest' => $guest
        ]);
    }


     public function movein(Property $property, Unit $unit, Guest $guest)
    {
        Guest::where('uuid', $guest->uuid)
        ->update([
            'status' => 'active',
            'movein_at' => Carbon::now()
        ]);

        return back()->with('success', 'Success!');
    }

    public function update(Request $request ,$uuid)
    {

        $booking = Guest::find($uuid);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return response()->json('Event updated');
    }

    public function moveout(Property $property, Unit $unit, Guest $guest)
    {      
        Guest::where('uuid', $guest->uuid)
        ->update([
            'status' => 'inactive',
            'moveout_at' => Carbon::now()
        ]);

        return back()->with('success', 'Success!');
    }

    public function destroy($unit_uuid){
        Guest::where('unit_uuid', $unit_uuid)->delete();
    }
    
}
