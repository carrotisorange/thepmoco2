<?php


namespace App\Http\Controllers\Subfeatures;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\SendWelcomeMailToGuest;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;

class BookingController extends Controller
{
    public function update(Request $request, Booking $booking){

        $validated = $request->validate([
             'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
             'movein_at' => 'required|date',
             'moveout_at' => 'required|date|after:movein_at',
             'status' => 'required'
        ]);

       Booking::where('uuid', $booking->uuid)->update($validated);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function sendWelcomeMailToGuest($uuid, $guest,$movein_at, $moveout_at,$unit,$price,$email,$no_of_children,$no_of_senior_citizens,$no_of_pwd,$remarks, $no_of_guests)
    {
        $details =[
          'uuid' => $uuid,
          'guest' => $guest,
          'checkin_date' => $movein_at,
          'checkout_date' => $moveout_at,
          'unit' => $unit,
          'price' => $price,
          'email' => $email,
          'no_of_children' => $no_of_children,
          'no_of_senior_citizens' => $no_of_senior_citizens,
          'no_of_pwd' => $no_of_pwd,
          'remarks' => $remarks,
          'no_of_guests' => $no_of_guests
        ];

        Mail::to($email)->send(new SendWelcomeMailToGuest($details));
    }
}
