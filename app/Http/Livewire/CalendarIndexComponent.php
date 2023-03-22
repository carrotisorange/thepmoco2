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

        $events = array();

        $contracts = Property::find($this->property->uuid)->contracts;

        foreach($contracts as $contract){
            $events[] = [
            'start' => $contract->start,
            'tenant' => $contract->tenant->tenant,
            'unit' => $contract->unit->unit,
            'status' => $contract->status
            ];
        }

         $guests = Property::find($this->property->uuid)->guests;

        return view('livewire.calendar-index-component',[
            'units' => $units,
            'events' => 'asdasd'
        ]);
    }
}
