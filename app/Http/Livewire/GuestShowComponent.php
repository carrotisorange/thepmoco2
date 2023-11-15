<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use DB;
use App\Mail\SendWelcomeMailToGuest;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Models\{Guest,Property,AcknowledgementReceipt,AdditionalGuest,Bill,Collection,Booking,Unit,Feature};

class GuestShowComponent extends Component
{
    public $guest_details;

    public $guest;
    public $uuid;
    public $mobile_number;
    public $email;
    public $unit_uuid;
    public $movein_at;
    public $moveout_at;
    public $price;

    public $view = 'listView';

    public $isPaymentAllowed = false;

    public $isIndividualView = true;

    public $guest_uuid;

    public $user_type = 'guest';

    public function mount($guest_details){
        $this->uuid = $guest_details->uuid;
        $this->guest = $guest_details->guest;
        $this->mobile_number = $guest_details->mobile_number;
        $this->email = $guest_details->email;
        $this->guest_uuid = $guest_details->uuid;
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
        $validatedData = $this->validate(
            [
                'email' => 'required|email',
                'guest' => 'required',
                'mobile_number' => 'required'
            ]
        );

        try{
            DB::transaction(function () use ($validatedData){
                $this->guest_details->update($validatedData);

                session()->flash('success', 'Changes Saved!');
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
            'guest_uuid' => $this->guest_details->uuid
        ]);

          return redirect('/property/'.Session::get('property_uuid').'/guest/'.$this->guest_details->uuid)->with('success', 'Changes Saved!');
    }

    public function deleteGuest(){

        AdditionalGuest::where('guest_uuid', $this->guest_details->uuid)->delete();
        Bill::where('guest_uuid', $this->guest_details->uuid)->delete();
        Collection::where('guest_uuid', $this->guest_details->uuid)->delete();
        AcknowledgementReceipt::where('guest_uuid', $this->guest_details->uuid)->delete();
        Guest::where('uuid', $this->guest_details->uuid)->delete();
        Booking::where('guest_uuid', $this->guest_details->uuid)->delete();

        return redirect('/property/'.Session::get('property_uuid').'/guest/')->with('success', 'Changes Saved!');

    }

    public function exportGuest(){

        return redirect('/property/'.Session::get('property_uuid').'/guest/'.$this->guest_details->uuid.'/export');
    }

    public function storeBooking(){

        $validated = $this->validate([
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'movein_at' => 'required|date',
            'moveout_at' => 'required|date|after:movein_at',
            'price' => 'nullable'
        ]);

        $validated['uuid'] = app('App\Http\Controllers\PropertyController')->generate_uuid();
        $validated['property_uuid'] = Session::get('property_uuid');
        $validated['guest_uuid'] = $this->guest_details->uuid;

        $booking = Booking::create($validated);

        $this->send_mail_to_guest($booking);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function updatedUnitUuid(){
        $this->price = Unit::find($this->unit_uuid)->transient_rent;
    }

     public function send_mail_to_guest($booking)
      {
        $property = Property::find($booking->property_uuid);

        $details =[
          'uuid' => $booking->uuid,
          'guest' => $booking->guest->guest,
          'checkin_date' => $booking->movein_at,
          'checkout_date' => $booking->moveout_at,
          'unit' => $booking->unit->unit,
        //   'price' => $guest->price,
          'email' => $booking->guest->email,
          'notes' => $property->note_to_transient
        ];

         Mail::to($booking->guest->email)->send(new SendWelcomeMailToGuest($details));
    }

    public function redirectToTheCreateBillPage(){


        return redirect('/property/'.Session::get('property_uuid').'/guest/'.$this->guest_details->uuid.'/bills');
    }

    public function render()
    {
        $featureId = 7;

        $guestSubfeatures = Feature::where('id', $featureId)->pluck('subfeatures')->first();

        $guestSubfeaturesArray = explode(",", $guestSubfeatures);

         $collections = Collection::
          select('*', DB::raw("SUM(collection) as collection"),DB::raw("count(collection) as count") )
          ->where('property_uuid', Session::get('property_uuid'))
          ->where('guest_uuid', $this->guest_details->uuid)
          ->posted()
          ->groupBy('ar_no')
          ->orderBy('ar_no', 'desc')
          ->get();

        return view('livewire.features.guest.guest-show-component',[
            'units' => Property::find(Session::get('property_uuid'))->units->where('rent_duration', 'daily'),
            'bills' => Guest::find($this->guest_details->uuid)->bills()->orderBy('created_at', 'desc')->get(),
            'collections' => $collections,
            'additional_guests' => AdditionalGuest::where('guest_uuid', $this->guest_details->uuid)->get(),
            'bookings' => Booking::where('guest_uuid', $this->guest_details->uuid)->get(),
            'guestSubfeaturesArray' => $guestSubfeaturesArray

        ]);
    }
}
