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
use App\Models\Bill;
use App\Models\Collection;
use App\Models\Booking;

class GuestShowComponent extends Component
{
    public $property;
    public $guest_details;

    //guest input fields
    public $guest;
    public $uuid;
    public $mobile_number;
    public $email;
    public $unit_uuid;
    public $movein_at;
    public $moveout_at;


    public $view = 'listView';

    public $isPaymentAllowed = false;
    
    public function mount($guest_details){
        $this->uuid = $guest_details->uuid;
        $this->guest = $guest_details->guest;
        $this->mobile_number = $guest_details->mobile_number;
        $this->email = $guest_details->email;
    }

    protected function rules()
    {
        return [
            'guest' => 'required',
            'mobile_number' => 'required',
            'email' => 'required',
            'unit_uuid' => 'required',
            'movein_at' => 'required|date',
            'moveout_at' => 'required|date|after:movein_at',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateGuest()
    {
        sleep(2);
       
        $validatedData = $this->validate(
            [
                'email' => 'required|email',
                'guest' => 'required',
                'mobile_number' => 'required'
            ],
        );
         
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

        if(!$this->additional_guest){
            return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest_details->uuid)->with('error', 'Error!');
        }

        AdditionalGuest::create([
            'additional_guest' => $this->additional_guest, 
            // 'birthdate' => $this->birthdate,
            // 'has_disability' => $this->has_disability,
            // 'disability' => $this->disability,
            'guest_uuid' => $this->guest_details->uuid
        ]);

          return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest_details->uuid)->with('success', 'Success!');
    }

    public function deleteGuest(){
        sleep(2);

        AdditionalGuest::where('guest_uuid', $this->guest_details->uuid)->delete();
        Bill::where('guest_uuid', $this->guest_details->uuid)->delete();
        Collection::where('guest_uuid', $this->guest_details->uuid)->delete();
        AcknowledgementReceipt::where('guest_uuid', $this->guest_details->uuid)->delete();
        Guest::where('uuid', $this->guest_details->uuid)->delete();
        Booking::where('guest_uuid', $this->guest_details->uuid)->delete();

        return redirect('/property/'.$this->property->uuid.'/guest/')->with('success', 'Success!');

    }

    public function exportGuest(){
        sleep(2);

        return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest_details->uuid.'/export');
    }

    public function storeBooking(){
        
        sleep(2);

        Booking::create([
            'uuid' => app('App\Http\Controllers\PropertyController')->generate_uuid(),
            'unit_uuid' => $this->unit_uuid,
            'movein_at' => $this->movein_at,
            'moveout_at' => $this->moveout_at,
            'property_uuid' => $this->property->uuid,
            'guest_uuid' => $this->guest_details->uuid
        ]);

        return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest_details->uuid)->with('success', 'Success!');
    }

    public function redirectToTheCreateBillPage(){
        sleep(2);

        return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest_details->uuid.'/bills');
    }

    public function render()
    {
        return view('livewire.guest-show-component',[
            'units' => Property::find($this->property->uuid)->units,
            'bills' => Guest::find($this->guest_details->uuid)->bills,
            'collections' => AcknowledgementReceipt::where('guest_uuid', $this->guest_details->uuid)->orderBy('id','desc')->paginate(5),
            'additional_guests' => AdditionalGuest::where('guest_uuid', $this->guest_details->uuid)->get(),
            'bookings' => Booking::where('guest_uuid', $this->guest_details->uuid)->get(),
        ]);
    }
}
