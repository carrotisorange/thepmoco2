<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\Agent;

class CalendarIndexComponent extends Component
{
    public $property;

    public function render()
    {
        $units = Property::find($this->property->uuid)->units->where('rent_duration', 'transient');

        return view('livewire.calendar-index-component',[
            'agents' => Agent::where('property_uuid', $this->property->uuid)->where('is_active',1)->get(),
            'units' => $units,
            'property' => $this->property
        ]);
    }
}
