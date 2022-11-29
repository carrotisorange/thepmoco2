<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use Livewire\Component;
use Session;
use Livewire\WithPagination;

class OwnerIndexComponent extends Component
{
    use WithPagination;

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
