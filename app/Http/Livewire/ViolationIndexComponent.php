<?php

namespace App\Http\Livewire;

use Session;
use Livewire\Component;
use App\Models\Violation;

class ViolationIndexComponent extends Component
{
    public function render()
    {
        $violations = Violation::where('property_uuid', Session::get('property_uuid'))->get();
        
        return view('livewire.violation-index-component',compact(
            'violations'
        ));
    }
}
