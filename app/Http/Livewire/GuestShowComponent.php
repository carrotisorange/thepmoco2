<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Illuminate\Validation\Rule;
use DB; 
use Carbon\Carbon;
use App\Models\Guest;
use App\Models\AcknowledgementReceipt;
use App\Models\AdditionalGuest;

class GuestShowComponent extends Component
{
    public $property;
    public $guest_details;

    //guest input fields
    public $guest;
    public $uuid;
    public $mobile_number;
    public $email;
    public $status;
    public $unit_uuid;
    public $movein_at;
    public $arrival_time;
    public $moveout_at;
    public $departure_time;
    public $no_of_guests;
    public $vehicle_details;
    public $plate_number;
    public $special_request;
    public $price;
    public $flight_itinerary;

    public $additional_guest;
    public $birthdate;
    public $has_disability;
    public $disability;


    public $view = 'listView';

    public $isPaymentAllowed = false;
    
    
    public function mount($guest_details){
        $this->uuid = $guest_details->uuid;
        $this->guest = $guest_details->guest;
        $this->mobile_number = $guest_details->mobile_number;
        $this->email = $guest_details->email;
        $this->status = $guest_details->status;
        $this->unit_uuid = $guest_details->unit_uuid;
        $this->movein_at = Carbon::parse($guest_details->movein_at)->format('Y-m-d');
        $this->moveout_at = Carbon::parse($guest_details->moveout_at)->format('Y-m-d');
        $this->no_of_guests= AdditionalGuest::where('guest_uuid', $this->guest_details->uuid)->count();
        $this->vehicle_details = $guest_details->vehicle_details;
        $this->plate_number = $guest_details->plate_number;
        $this->price = $guest_details->price;
        $this->arrival_time = $guest_details->arrival_time;
        $this->departure_time = $guest_details->departure_time;
        $this->special_request = $guest_details->special_request;
        $this->flight_itinerary = $guest_details->flight_itinerary;
    }

    protected function rules()
    {
        return [
            'guest' => 'required',
            'mobile_number' => 'required',
            'email' => 'required',
            'status' => 'required',
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'movein_at' => 'required|date',
            'moveout_at' => 'required|date|after:movein_at',
            'no_of_guests' => 'required',
            'vehicle_details' => 'nullable',
            'plate_number' => 'nullable',
            'price' => 'required',
            'arrival_time' => 'required',
            'departure_time' => 'required',
            'special_request' => 'nullable',
            'flight_itinerary' => 'nullable'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateGuest()
    {
        sleep(2);
       
        $validatedData = $this->validate();
         
        try{
            DB::transaction(function () use ($validatedData){
                $this->guest_details->update($validatedData);

                session()->flash('success', 'Success!');
            });
            
        }catch(\Exception $e){
            session()->flash('error', $e);
        }
    }

    public function store_additional_guest(){

        sleep(2);

        if(!$this->additional_guest || !$this->birthdate || !$this->has_disability){
            return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest_details->uuid)->with('error', 'Error!');
        }

        AdditionalGuest::create([
            'additional_guest' => $this->additional_guest, 
            'birthdate' => $this->birthdate,
            'has_disability' => $this->has_disability,
            'disability' => $this->disability,
            'guest_uuid' => $this->guest_details->uuid
        ]);

          return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest_details->uuid)->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.guest-show-component',[
            'units' => Property::find($this->property->uuid)->units,
            'bills' => Guest::find($this->guest_details->uuid)->bills,
            'collections' => AcknowledgementReceipt::where('guest_uuid', $this->guest_details->uuid)->orderBy('id','desc')->paginate(5),
            'additional_guests' => AdditionalGuest::where('guest_uuid', $this->guest_details->uuid)->get()
        ]);
    }
}
