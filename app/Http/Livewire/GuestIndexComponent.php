<?php

namespace App\Http\Livewire;

use App\Models\Guest;
use Livewire\Component;
use Session;
use Livewire\WithPagination;

class GuestIndexComponent extends Component
{
    use WithPagination;

    public $search = null;

    public function redirectToUnitSelectionPage(){

        sleep(2);

        return redirect('/property/'.Session::get('property').'/unit');
    }

    public function render()
    {
        return view('livewire.guest-index-component', [
        'guests' => Guest::search($this->search)
        ->join('units', 'unit_uuid', 'units.uuid')
        ->where('property_uuid', Session::get('property'))
        ->orderBy('guests.created_at', 'asc')
        ->paginate(10)
    ]);
    }
}
