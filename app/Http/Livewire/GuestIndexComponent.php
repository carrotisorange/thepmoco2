<?php

namespace App\Http\Livewire;

use App\Models\Guest;
use Livewire\Component;
use Session;
use Livewire\WithPagination;

class GuestIndexComponent extends Component
{
    use WithPagination;

    public $uuid;

    public $status;

    public function redirectToUnitSelectionPage(){

        sleep(2);

        return redirect('/property/'.Session::get('property').'/unit');
    }

    public function render()
    {
        return view('livewire.guest-index-component', [
        'guests' => Guest::where('property_uuid', Session::get('property'))
         ->where('uuid','like', '%'.$this->uuid.'%')
         ->when($this->status, function($query){
         $query->where('status',$this->status);
         })
        ->paginate(10)
    ]);
    }
}
