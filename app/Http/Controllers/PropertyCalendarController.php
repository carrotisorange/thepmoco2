<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeMailToGuest;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Booking;
use Session;
use Str;
use App\Models\Guest;
use Illuminate\Support\Facades\Mail;
use App\Models\Unit;

class PropertyCalendarController extends Controller
{
    public function index(Property $property){
       
        $events = array();

        $bookings = Property::find($property->uuid)->guests;

        foreach($bookings as $booking){
            $events[] = [
                'id' => $booking->uuid,
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

        sleep(2);
        
       $validated = $request->validate([
            'guest' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile_number' => 'required',
            'movein_at' => 'required',
            'moveout_at' => 'required|after:movein_at',
            'unit_uuid' => 'required',
            'property_uuid' => 'required'
        ]);

        $start = strtotime($request->movein_at); // convert to timestamps
        $end = strtotime($request->moveout_at); // convert to timestamps
        $days = (int)(($end - $start)/86400);

        $guest  = Guest::create([
            'uuid' => app('App\Http\Controllers\PropertyController')->generate_uuid(),
            'guest' => $request->guest,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'movein_at' => $request->movein_at,
            'moveout_at' => $request->moveout_at,
            'unit_uuid' => $request->unit_uuid,
            'property_uuid' => $request->property_uuid,
            'price' => (Unit::find($request->unit_uuid)->transient_rent * $days) - Unit::find($request->unit_uuid)->transient_discount,
        ]);


        $this->send_mail_to_guest($guest);

        return response()->json($guest);
    }

    public function send_mail_to_guest($guest)
      {
        $property = Property::find($guest->property_uuid);
        
        $details =[
          'uuid' => $guest->uuid,
          'guest' => $guest->guest,
        //   'start' => $guest->movein_at,
        //   'end' => $guest->moveout_at,
        //   'unit' => $guest->unit->unit,
        //   'price' => $guest->price,
          'email' => $guest->email,
          'property_name' => $property->property,
          'property_mobile' => $property->mobile,
          'property_facebook_page' => $property->facebook_page,
          'property_telephone' => $property->telephone,
          'property_email' => $property->email,
          'property_address' => $property->barangay.', '.$property->city->city.', '.$property->province->province.' '.$property->country->country
        ];

         Mail::to($guest->email)->send(new SendWelcomeMailToGuest($details));
    }

    public function update(Request $request, $id){
       $guest = Guest::find($id);
       if(!$guest){
        return response()->json([
            'error'=>'Unable to locate the guest'
        ],404);
       }

       $guest->update([
        'movein_at' => $request->movein_at,
        'moveout_at' => $request->moveout_at
       ]);

       return response()->json('Guest Updated!');
    }

   public function destroy($id)
    {
        $guest = Guest::find($id);

        if(!$guest) {
            return response()->json([
                'error' => 'Unable to locate the guest'
            ], 404);
        }
        
        $guest->delete();
        
        return $id;
    }

    public function show($id){
        return redirect('/property/'.Session::get('property').'/guest/'.$id);
    }
}
