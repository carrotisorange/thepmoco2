<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Livewire\WithPagination;
use App\Models\{Property,Booking};

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
        $bookings = Booking::where('property_uuid', Session::get('property_uuid'))
        ->where('uuid','like', '%'.$this->uuid.'%')
        ->when($this->status, function($query){
            $query->where('status',$this->status);
        })
        ->get();

        $propertyBookingsCount = app('App\Http\Controllers\Features\GuestController')->get()->count();

        return view('livewire.features.guest.guest-index-component', compact (
            'bookings',
            'propertyBookingsCount'
        ));
    }
}
