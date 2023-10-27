<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bulletin;
use Session;

class BulletinIndexComponent extends Component
{
    public function render()
    {
        $bulletins = Bulletin::where('property_uuid', Session::get('property_uuid'))->where('is_approved',1)->get();

        return view('livewire.bulletin-index-component',[
            'bulletins' => $bulletins
        ]);
    }
}
