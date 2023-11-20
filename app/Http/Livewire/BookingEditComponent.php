<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Illuminate\Validation\Rule;
use DB;
use App\Models\{Guest,AcknowledgementReceipt,AdditionalGuest,Booking};

class BookingEditComponent extends Component
{
    public $guest_details;
    public $booking_details;

    public $status;
    public $unit_uuid;
    public $movein_at;
    public $moveout_at;

    public $view = 'listView';

    public $isPaymentAllowed = false;

    public function mount($booking_details){
        $this->status = $booking_details->uuid;
        $this->unit_uuid = $booking_details->unit_uuid;
        $this->movein_at = $booking_details->movein_at;
        $this->moveout_at = $booking_details->moveout_at;
    }

    protected function rules()
    {
        return [

            'status' => 'required',
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'movein_at' => 'required|date',
            'moveout_at' => 'required|date|after:movein_at',

        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateBooking()
    {
        $validatedData = $this->validate();

        try{
            DB::transaction(function () use ($validatedData){
                $this->guest_details->update($validatedData);

                return redirect(url()->previous())->with('success', 'Changes Saved!');
            });

        }catch(\Exception $e){
           return redirect(url()->previous())->with('error', $e);
        }
    }

    public function store_additional_guest(){



        if(!$this->additional_guest){
            return redirect('/property/'.Session::get('property_uuid').'/guest/'.$this->guest_details->uuid)->with('error', 'Error!');
        }

        AdditionalGuest::create([
            'additional_guest' => $this->additional_guest,
            // 'birthdate' => $this->birthdate,
            // 'has_disability' => $this->has_disability,
            // 'disability' => $this->disability,
            'guest_uuid' => $this->guest_details->uuid
        ]);

          return redirect('/property/'.Session::get('property_uuid').'/guest/'.$this->guest_details->uuid)->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.booking-edit-component',[
            'units' => Property::find(Session::get('property_uuid'))->units,
            'bills' => Guest::find($this->guest_details->uuid)->bills,
            'collections' => AcknowledgementReceipt::where('guest_uuid', $this->guest_details->uuid)->orderBy('id','desc')->paginate(5),
            'additional_guests' => AdditionalGuest::where('guest_uuid', $this->guest_details->uuid)->get(),
            'bookings' => Booking::where('guest_uuid', $this->guest_details->uuid)->get(),
        ]);
    }
}
