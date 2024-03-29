<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\{Property, Bill, Guest, Unit, Booking};
use App\Mail\SendWelcomeMailToGuest;
use Illuminate\Support\Facades\Mail;

class CalendarController extends Controller
{
    public function index(Property $property){

        $featureId = 4; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        $events = array();

        $bookings = Property::find($property->uuid)->bookings->where('status', '!=','cancelled');


        foreach($bookings as $booking){
            $events[] = [
                'id' => $booking->guest->uuid,
                'title' => $booking->guest->guest.' @ '.$booking->unit->unit,
                'start' => $booking->movein_at,
                'end' => $booking->moveout_at,
                'status' => $booking->status
            ];
        }

        return view('features.calendars.index',[
            'property' => $property,
            'units' => Property::find($property->uuid)->units,
            'events' => $events,
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'guest' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile_number' => 'required',
            'movein_at' => 'required',
            'moveout_at' => 'required|after:movein_at',
            'unit_uuid' => 'required',
            'property_uuid' => 'required',
            'agent_id' => ['nullable', Rule::exists('agents', 'id')],
            'no_of_children' => 'nullable',
            'no_of_senior_citizens' => 'nullable',
            'no_of_pwd' => 'nullable',
            'no_of_guests' => 'nullable',
            'remarks' => 'nullable',
        ]);

        // try{

            // DB::transaction(function () use ($request, $validatedData){

            $start = strtotime($request->movein_at); // convert to timestamps
            $end = strtotime($request->moveout_at); // convert to timestamps
            $days = (int)(($end - $start)/86400);
            $price = (Unit::find($request->unit_uuid)->transient_rent * $days) - Unit::find($request->unit_uuid)->transient_discount;
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

            $booking = $this->store_booking(
                $booking_uuid,
                $guest->uuid,
                $request->unit_uuid,
                $request->property_uuid,
                $request->movein_at,
                $request->moveout_at,
                $price,
                $request->agent_id,
                $request->no_of_guests,
                $request->no_of_children,
                $request->no_of_senior_citizens,
                $request->no_of_pwd,
                $request->remarks
            );
            $particular_id = 1; //rent

            $this->store_bill(
                $request->property_uuid,
                $request->unit_uuid,
                $particular_id, $request->movein_at,
                $request->moveout_at,
                $price,
                $guest->uuid
            );

            $this->send_mail_to_guest($guest, $booking);

            $this->update_unit($request->unit_uuid);

            return response()->json($guest);

        // });

        // }catch(\Exception $e)
        // {
        //     return back()->with('error',$e);
        // }
    }

    public function update_unit($unit_uuid){
        Unit::where('uuid', $unit_uuid)->update([
            'status_id' => 2
        ]);
    }

    public function store_booking($booking_uuid, $guest_uuid, $unit_uuid, $property_uuid, $movein_at, $moveout_at,
    $price, $agent_id, $no_of_guests, $no_of_children, $no_of_senior_citizens, $no_of_pwd, $remarks){

        $booking = Booking::create(
        [
            'uuid' => $booking_uuid,
            'guest_uuid' => $guest_uuid,
            'unit_uuid' => $unit_uuid,
            'property_uuid' => $property_uuid,
            'movein_at' => $movein_at,
            'moveout_at' => $moveout_at,
            'price' => $price,
            'agent_id' => $agent_id,
            'no_of_guests' => $no_of_guests,
            'no_of_children' => $no_of_children,
            'no_of_senior_citizens' => $no_of_senior_citizens,
            'no_of_pwd' => $no_of_pwd,
            'remarks' => $remarks
        ]);

        return $booking;
    }

    public function store_guest($guest_uuid, $guest, $email, $mobile_number, $movein_at, $moveout_at, $unit_uuid, $property_uuid, $price){

        $guest = Guest::create(
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

                 public function send_mail_to_guest($guest, $booking)
                 {
                 $details =[
                 'uuid' => $guest->uuid,
                 'guest' => $guest->guest,
                 'checkin_date' => $guest->movein_at,
                 'checkout_date' => $guest->moveout_at,
                 'unit' => $guest->unit->unit,
                 'price' => $guest->price,
                 'email' => $guest->email,
                 'no_of_children' => $booking->no_of_children,
                 'no_of_senior_citizens' => $booking->no_of_senior_citizens,
                 'no_of_pwd' => $booking->no_of_pwd,
                 'remarks' => $booking->remarks,
                 'no_of_guests' => $booking->no_of_guests
                 ];

                 Mail::to($guest->email)->send(new SendWelcomeMailToGuest($details));
                 }

    public function store_bill($property_uuid, $unit_uuid, $particular_id, $start, $end, $bill, $guest_uuid){
         Bill::create([
            'bill_no' => app('App\Http\Controllers\Features\BillController')->getLatestBillNo(),
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
