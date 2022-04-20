<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use Livewire\Component;
use Session;

class OwnerIndexComponent extends Component
{
    public $search = null;

    public function render()
    {
        return view('livewire.owner-index-component', [
        'owners' => Owner::search($this->search)
        ->where('property_uuid', Session::get('property'))
        ->orderBy('created_at', 'asc')
        ->paginate(10)
    ]);
    }
}
