<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;

use App\Models\Unit;
use Livewire\Component;

class UtilityStoreComponent extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.utility-store-component',[
             'units' => Unit::search($this->search)->paginate(10)
        ]);
    }
}
