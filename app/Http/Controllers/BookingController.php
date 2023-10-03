<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Validation\Rule;

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

        return back()->with('success', 'Changes Saved!');
    }
}
