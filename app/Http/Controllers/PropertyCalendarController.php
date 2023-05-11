<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeMailToGuest;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Bill;
use Session;
use App\Models\Guest;
use Illuminate\Support\Facades\Mail;
use App\Models\Unit;
use Carbon\Carbon;
use App\Models\Booking;

class PropertyCalendarController extends Controller
{
    public function index(Property $property){

    app('App\Http\Controllers\PropertyController')->store_property_session($property->uuid);

        // return view('properties.calendars.pending',[
        //     'property' => $property,
        //     'units' => Property::find($property->uuid)->units,
        //     // 'events' => $events,
        // ]);
       
        app('App\Http\Controllers\PropertyController')->store_property_session($property->uuid);

        app('App\Http\Controllers\PropertyController')->save_unit_stats($property->uuid);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);
                
        $events = array();

        // $bookings = Property::find($property->uuid)->guests->where('status', '!=', 'cancelled');

        $bookings = Property::find($property->uuid)->bookings->where('status', '!=', 'cancelled');


        foreach($bookings as $booking){
            $events[] = [
                'id' => $booking->guest_uuid,
                'title' => $booking->unit->unit,
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

        $price = (Unit::find($request->unit_uuid)->transient_rent * $days) -
        Unit::find($request->unit_uuid)->transient_discount;

        $guest_uuid = app('App\Http\Controllers\PropertyController')->generate_uuid();

        $booking_uuid = app('App\Http\Controllers\PropertyController')->generate_uuid();
       
        $guest = $this->store_guest(
            $guest_uuid,
            $request->guest,
            $request->email,
            $request->mobile_number,
            $request->movein_at,
            $request->moveout_at,
            $request->unit_uuid,
            $request->property_uuid,
            $price
        );

        $this->store_booking(
            $booking_uuid,
            $guest->uuid,
            $request->unit_uuid,
            $request->property_uuid,
            $request->movein_at,
            $request->moveout_at,
            $price
        );

        $particular_id = 1; //rent 

        $this->store_bill($request->property_uuid, $request->unit_uuid, $particular_id, $request->movein_at, $request->moveout_at, $price, $guest->uuid);

    //    if($request->is_send_email === 'no'){
         $this->send_mail_to_guest($guest);
    //    }

        $this->update_unit($request->unit_uuid);

        return response()->json($guest);

        // return redirect('/property/'.$request->property_uuid.'/guest/'.$guest->uuid)->with('success', 'Success!');
    }

    public function update_unit($unit_uuid){
        Unit::where('uuid', $unit_uuid)->update([
            'status_id' => 4
        ]);
    }

    public function store_booking($booking_uuid, $guest_uuid, $unit_uuid, $property_uuid, $movein_at, $moveout_at, $price){
        Booking::updateOrCreate(
        [
            'movein_at' => $movein_at,
            'moveout_at' => $moveout_at,
            'price' => $price,
            'unit_uuid' => $unit_uuid,
            'property_uuid' => $property_uuid,
        ]
        ,    
        [
            'uuid' => $booking_uuid,
            'guest_uuid' => $guest_uuid,
            'unit_uuid' => $unit_uuid,
            'property_uuid' => $property_uuid,
            'movein_at' => $movein_at,
            'moveout_at' => $moveout_at,
            'price' => $price,
        ]);
    }

    public function store_guest($guest_uuid, $guest, $email, $mobile_number, $movein_at, $moveout_at, $unit_uuid, $property_uuid, $price){
        
        $guest = Guest::updateOrCreate(
            [
                'unit_uuid' => $unit_uuid,
                'property_uuid' => $property_uuid,
                'guest' => $guest,
                'movein_at' => $movein_at,
                'moveout_at' => $moveout_at,
            ]
            ,
            [
                'uuid' => $guest_uuid,
                'guest' => $guest,
                'email' => $email,
                'mobile_number' => $mobile_number,
                'movein_at' => $movein_at,
                'moveout_at' => $moveout_at,
                'unit_uuid' => $unit_uuid,
                'property_uuid' => $property_uuid,
                'price' => $price,
        ]);

        return $guest;
    }

    public function store_bill($property_uuid, $unit_uuid, $particular_id, $start, $end, $bill, $guest_uuid){
         Bill::create([
            'bill_no' => app('App\Http\Controllers\BillController')->get_latest_bill_no($property_uuid),
            'unit_uuid' => $unit_uuid,
            'particular_id' => $particular_id,
            'start' => $start,
            'end' => $end,
            'bill' => $bill,
            'reference_no' => null,
            'due_date' => Carbon::parse($start)->addDays(7),
            'user_id' => auth()->user()->id,
            'property_uuid' => $property_uuid,
            'guest_uuid' => $guest_uuid,
            'is_posted' => true,
            'description' => 'movein charges'
         ]);
    }

    public function send_mail_to_guest($guest)
      {
        $property = Property::find($guest->property_uuid);
        
        $details =[
          'uuid' => $guest->uuid,
          'guest' => $guest->guest,
          'checkin_date' => $guest->movein_at,
          'checkout_date' => $guest->moveout_at,
        //   'unit' => $guest->unit->unit,
        //   'price' => $guest->price,
          'email' => $guest->email,
          'property_name' => $property->property,
          'property_mobile' => $property->mobile,
          'property_facebook_page' => $property->facebook_page,
          'property_telephone' => $property->telephone,
          'property_email' => $property->email,
          'property_address' => $property->barangay.', '.$property->city->city.', '.$property->province->province.' '.$property->country->country,
          'note_to_transient' => $property->note_to_transient
        ];

         Mail::to($guest->email)->send(new SendWelcomeMailToGuest($details));
    }

    public function update(Request $request, $id){
       $guest = Booking::where('guest_uuid', $id);
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

    public function show($uuid){
        return Guest::find($uuid);
    }
}
