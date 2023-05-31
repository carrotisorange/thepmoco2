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

    public function mount(Booking $booking){
        $this->unit_uuid = $booking->unit_uuid;
        $this->movein_at = Carbon::parse($booking->movein_at)->format('Y-m-d');
        $this->moveout_at = Carbon::parse($booking->moveout_at)->format('Y-m-d');
        $this->status = $booking->status;
        $this->price = $booking->price;
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
            'price' => 'nullable'
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
