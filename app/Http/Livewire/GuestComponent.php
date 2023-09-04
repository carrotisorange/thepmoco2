<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use DB;
use Carbon\Carbon;

class GuestComponent extends Component
{
    public $unitDetails;

    public $unit_uuid;
    public $guest;
    public $mobile_number;
    public $email;
    public $movein_at;
    public $moveout_at;

    public $vehicle_details;
    public $plate_number;

    public function mount($unitDetails)
    {
        $this->unit_uuid = $unitDetails->uuid;
        $this->movein_at = Carbon::now()->format('Y-m-d');
    }

    protected function rules()
    {
        return [
            'guest' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'mobile_number' => 'nullable',
            'movein_at' => 'required|date',
            'moveout_at' => 'required|date|after:movein_at',
            'vehicle_details' => 'nullable',
            'plate_number' => 'nullable',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        

        $validatedData = $this->validate();

       try{
            DB::transaction(function () use ($validatedData){
            
            $guest_uuid = app('App\Http\Controllers\PropertyController')->generate_uuid();
               
            app('App\Http\Controllers\GuestController')->store($guest_uuid, $this->unit_uuid, $this->guest, $this->email, $this->mobile_number, $this->movein_at, $this->moveout_at, $this->vehicle_details, $this->plate_number);

            return
            redirect('/property/'.Session::get('property_uuid').'/unit/'.$this->unit_uuid)->with('success','Success!');
      
            });
        
       }catch(\Exception $e)
       {
            return back()->with('error',$e);
       }
    }

    public function render()
    {
        return view('livewire.guest-component');
    }
}
