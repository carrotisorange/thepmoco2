<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Unit;
use Carbon\Carbon;
use DB;
use Session;

class GuestController extends Controller
{
    public function show_unit_guests($unit_uuid)
    {
       return Guest::where('unit_uuid', $unit_uuid)->get();
    }

    public function create(Property $property, Unit $unit)
    {
        return view('guests.create', [
            'unit' => $unit
        ]);
    }
    
    public function store($guest_uuid, $unit_uuid, $guest, $email, $mobile_number, $movein_at, $moveout_at, $vehicle_details, $plate_number)
    {
        Guest::create([
            'uuid' => $guest_uuid,
            'unit_uuid' => $unit_uuid,
            'guest' => $guest,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'movein_at' => $movein_at,
            'moveout_at' => $moveout_at,
            'property_uuid' => Session::get('property'), 
            'vehicle_details' => $vehicle_details, 
            'plate_number' => $plate_number
        ]);
    }
}
