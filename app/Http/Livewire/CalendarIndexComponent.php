<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;

class CalendarIndexComponent extends Component
{
    public $property;

    public function render()
    {
        $units = Property::find($this->property->uuid)->units;

        return view('livewire.calendar-index-component',[
            'units' => $units,
            'property' => $this->property
        ]);
    }
}
