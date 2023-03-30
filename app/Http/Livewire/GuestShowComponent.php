<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Illuminate\Validation\Rule;
use DB; 
use Carbon\Carbon;
use App\Models\Guest;

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
    public $moveout_at;
    public $no_of_guests;
    public $vehicle_details;
    public $plate_number;
    public $price;

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
        $this->no_of_guests= $guest_details->no_of_guests;
        $this->vehicle_details = $guest_details->vehicle_details;
        $this->plate_number = $guest_details->plate_number;
        $this->price = $guest_details->price;
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
            'vehicle_details' => 'required',
            'plate_number' => 'required',
            'price' => 'required',
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

    public function render()
    {
        return view('livewire.guest-show-component',[
            'units' => Property::find($this->property->uuid)->units,
            'bills' => Guest::find($this->guest_details->uuid)->bills,
            'collections' => Guest::find($this->guest_details->uuid)->collections
        ]);
    }
}
