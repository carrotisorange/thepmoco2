<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\Agent;
use Session;

class CalendarIndexComponent extends Component
{
    public function render()
    {
        $units = Property::find(Session::get('property_uuid'))->units->where('rent_duration', 'daily');

        return view('livewire.calendar-index-component',[
            'agents' => Agent::where('property_uuid', Session::get('property_uuid'))->where('is_active',1)->get(),
            'units' => $units,
            'property' => Session::get('property_uuid')
        ]);
    }
}
