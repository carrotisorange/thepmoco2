<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;
use Session;
use Str;
use App\Models\Guest;

class PropertyCalendarController extends Controller
{
    public function index(Property $property){
       
        $events = array();

        $bookings = Property::find($property->uuid)->guests;

        foreach($bookings as $booking){
            $events[] = [
                'title' => $booking->guest,
                // 'unit' => $booking->unit->unit,
                'start' => $booking->movein_at,
                'end' => $booking->moveout_at,
                // 'status' => $booking->status
            ];
        }

        return view('properties.calendars.index',[
            'property' => $property,
            'units' => Property::find($property->uuid)->units,
            'events' => $events,
        ]);
    }

    public function store(Request $request){

       $validated = $request->validate([
            'guest' => 'required|string',
            'movein_at' => 'required',
            'moveout_at' => 'required|after:movein_at',
            'unit_uuid' => 'required',
            'property_uuid' => 'required'
        ]);

        $guest  = Guest::create([
            'uuid' => app('App\Http\Controllers\PropertyController')->generate_uuid(),
            'guest' => $request->guest,
            'movein_at' => $request->movein_at,
            'moveout_at' => $request->moveout_at,
            'unit_uuid' => $request->unit_uuid,
            'property_uuid' => $request->property_uuid
        ]);

        return response()->json($guest);
    }
}
