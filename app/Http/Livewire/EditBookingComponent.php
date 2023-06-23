<?php

namespace App\Http\Livewire;
use App\Models\Property;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Validation\Rule;
use App\Models\Unit;

class EditBookingComponent extends Component
{
    public $property;
    public Booking $booking;

    //input variables
    public $unit_uuid;
    public $movein_at;
    public $moveout_at;
    public $status;
    public $price;

    public $no_of_guests;
    public $vehicle_details;
    public $plate_number;
    public $special_request;
    public $flight_itinerary;
    public $arrival_time;
    public $departure_time;

    public function mount(Booking $booking){
        $this->unit_uuid = $booking->unit_uuid;
        $this->movein_at = Carbon::parse($booking->movein_at)->format('Y-m-d');
        $this->moveout_at = Carbon::parse($booking->moveout_at)->format('Y-m-d');
        $this->status = $booking->status;
        $this->price = $booking->price;
        $this->no_of_guests = $booking->no_of_guests;
        $this->vehicle_details = $booking->vehicle_details;
        $this->plate_number = $booking->plate_number;
        $this->special_request = $booking->special_request;
        $this->flight_itinerary = $booking->flight_itinerary;
        $this->arrival_time = $booking->arrival_time;
        $this->departure_time = $booking->departure_time;
    }
    
    public function updatedUnitUuid(){
        $this->price = Unit::find($this->unit_uuid)->transient_rent;
    }

    public function updateBooking(){

        $validated = $this->validate([
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'movein_at' => 'required|date',
            'moveout_at' => 'required|date|after:movein_at',
            'status' => 'required',
            'price' => 'nullable',
            'no_of_guests' => 'nullable',
            'vehicle_details' => 'nullable',
            'special_request' => 'nullable',
            'flight_itinerary' => 'nullable',
            'arrival_time' => 'required',
            'departure_time' => 'required',
            'plate_number' => 'nullable'
        ]);

        Booking::where('uuid', $this->booking->uuid)->update($validated);

       return redirect(url()->previous())->with('success', 'Success!');

    }

    public function render()
    {
        return view('livewire.edit-booking-component',[
            'units' => Property::find($this->property->uuid)->units->where('rent_duration', 'transient'),
        ]);
    }
}
