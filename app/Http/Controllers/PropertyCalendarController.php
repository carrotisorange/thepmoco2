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
                'title' => $booking->guest.' @ '.$booking->unit->unit,
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
            'movein_at' => 'required|date',
            'moveout_at' => 'required|date|after:start',
            'guest' => 'required|string',
            'unit_uuid' => 'required'
        ]);

       Guest::create([
            'uuid' => app('App\Http\Controllers\PropertyController')->generate_uuid(),
            'movein_at' => $request->movein_at,
            'moveout_at' => $request->moveout_at,
            'guest' => $request->guest,
            'unit_uuid' => $request->unit_uuid,
            'no_of_guests' => $request->no_of_guests,
            'vehicle_details' => $request->vehicle_details,
            'plate_number' => $request->plate_number,
            'property_uuid' => Session::get('property')
        ]);

       return back()->with('success', 'Success!');

        // return redirect('/property/'.Session::get('property').'/unit/'.$request->unit_uuid.'/guest/'.Str::random(8).'/create');
    }
}
