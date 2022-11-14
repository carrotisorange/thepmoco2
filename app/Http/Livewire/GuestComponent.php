<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use DB;

class GuestComponent extends Component
{
    public $unitDetails;

    public $unit_uuid;
    public $guest;
    public $mobile_number;
    public $email;
    public $movein_at;
    public $moveout_at;

    public function mount($unitDetails)
    {
        $this->unit_uuid = $unitDetails->uuid;
    }

    protected function rules()
    {
        return [
            'guest' => 'required',
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'mobile_number' => 'nullable',
            'movein_at' => 'required|date',
            'moveout_at' => 'required|date|after:movein_at',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        sleep(1);

        $validatedData = $this->validate();

       try{
            DB::transaction(function () use ($validatedData){
            $guest_uuid = app('App\Http\Controllers\PropertyController')->generate_uuid();
               
            app('App\Http\Controllers\GuestController')->store($guest_uuid, $this->unit_uuid, $this->guest, $this->email, $this->mobile_number, $this->movein_at, $this->moveout_at);

            return redirect('/property/'.Session::get('property').'/unit/'.$this->unit_uuid)->with('success','Guest is successfully created.');
      
            });
        
       }catch(\Exception $e)
       {
        ddd($e);
            return back()->with('error');
       }
    }

    public function render()
    {
        return view('livewire.guest-component');
    }
}
