<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UnitComponent extends Component
{

    public $units;
    public $buildings;
    public $floors;
    public $categories;
    public $batch_no;

    public function mount($units, $buildings, $floors, $categories, $batch_no)
    {
        $this->units = $units;
        $this->buildings = $buildings;
        $this->floors = $floors;
        $this->categories = $categories;
        $this->batch_no = $batch_no;
    }

    public function render()
    {
        return view('livewire.unit-component');
    }
}
