<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Bulletin;

class BulletinIndexComponent extends Component
{
    public function render()
    {
        $bulletins = Bulletin::where('property_uuid', Session::get('property_uuid'))->where('is_approved',1)->orderBy('id','desc')->get();

        return view('livewire.features.bulletin.bulletin-index-component',[
            'bulletins' => $bulletins
        ]);
    }
}
