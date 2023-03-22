<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;
use Session;
use Str;

class PropertyCalendarController extends Controller
{
    public function index(Property $property){

        return view('properties.calendars.index',[
            'property' => $property,
            'units' => Property::find($property->uuid)->units,
        ]);
    }

    public function store(Request $request){
    
        // $request->validate([
        //     'guest' => 'required|string',
        //     'unit_uuid' => 'required'
        // ]);

        // $booking = Booking::create([
        //     'guest' => $request->guest,
        //     'unit_uuid' => $request->unit_uuid,
        //     'start_date' => $request->start_date,
        //     'end_date' => $request->end_date,
        // ]);

        // $color = null;

        // if($booking->title == 'Test') {
        //     $color = '#924ACE';
        // }

        // return response()->json([
        //     'id' => $booking->id,
        //     'start' => $booking->start_date,
        //     'end' => $booking->end_date,
        //     'title' => $booking->title,
        //     'color' => $color ? $color: '',

        // ]);

        return redirect('/property/'.Session::get('property').'/unit/'.$request->unit_uuid.'/guest/'.Str::random(8).'/create');
    }
}
