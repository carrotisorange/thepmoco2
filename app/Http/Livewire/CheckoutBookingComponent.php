<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Session;
use App\Models\{Unit,Booking};

class CheckoutBookingComponent extends Component
{
    public $booking;

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

    public $no_of_children;
    public $no_of_senior_citizens;
    public $no_of_pwd;
    public $no_of_companions;
    public $remarks;

    public function mount($booking){
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
        $this->no_of_children = $booking->no_of_children;
        $this->no_of_senior_citizens = $booking->no_of_senior_citizens;
        $this->no_of_pwd = $booking->no_of_pwd;
        $this->no_of_companions = $booking->no_of_companions;
        $this->remarks = $booking->remarks;
    }

    protected function rules()
    {
        return [
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'movein_at' => 'required|date',
            'moveout_at' => 'required|date|after:movein_at',
            'status' => 'required',
            'price' => 'nullable',
            'no_of_guests' => 'nullable',
            'vehicle_details' => 'nullable',
            'special_request' => 'nullable',
            'flight_itinerary' => 'nullable',
            'arrival_time' => 'nullable',
            'departure_time' => 'nullable',
            'plate_number' => 'nullable',
            'no_of_children' => 'nullable',
            'no_of_senior_citizens' => 'nullable',
            'no_of_pwd' => 'nullable',
            'no_of_companions'=> 'nullable',
            'remarks'=> 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedUnitUuid(){
        if($this->unit_uuid){
            $this->price = Unit::find($this->unit_uuid)->transient_rent;
        }
    }

    public function updateBooking(){


        try {
            $validatedData = $this->validate();

            Booking::where('uuid', $this->booking->uuid)->update($validatedData);

            return redirect(url()->previous())->with('success', 'Changes Saved!');

        }catch (\Exception $e) {
       ;
            return redirect(url()->previous())->with('error', $e);

        }
    }

    public function render()
    {
        return view('livewire.edit-booking-component',[
            'units' => Unit::where('property_uuid',Session::get('property_uuid'))->where('rent_duration', 'daily')->get(),
        ]);
    }
}
