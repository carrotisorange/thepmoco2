<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use Session;

class BillIndexComponent extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.bill-index-component', [
        'bills' => Bill::search($this->search)
        ->where('property_uuid', Session::get('property'))
        ->orderBy('created_at', 'asc')
        ->paginate(10),
        ]);
    }
}
