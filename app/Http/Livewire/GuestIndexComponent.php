<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Livewire\Component;
use Session;
use Livewire\WithPagination;
use App\Models\Booking;

class GuestIndexComponent extends Component
{
    use WithPagination;

    public $uuid;

    public $status;

    public function redirectToUnitSelectionPage(){
        return redirect('/property/'.Session::get('property_uuid').'/unit');
    }

    public function render()
    {
        $propertyBookingsCount = Property::find(Session::get('property_uuid'))->bookings->count();

        return view('livewire.guest-index-component', [
        'bookings' => Booking::where('property_uuid', Session::get('property_uuid'))
        ->where('uuid','like', '%'.$this->uuid.'%')
         ->when($this->status, function($query){
         $query->where('status',$this->status);
         })
        ->get(),
        'propertyBookingsCount' => $propertyBookingsCount
    ]);
    }
}
