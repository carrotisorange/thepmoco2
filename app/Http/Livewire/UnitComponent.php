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
    public $unit_count;

    public function mount($units, $buildings, $floors, $categories, $batch_no, $unit_count)
    {
        $this->units = $units;
        $this->buildings = $buildings;
        $this->floors = $floors;
        $this->categories = $categories;
        $this->batch_no = $batch_no;
        $this->unit_count = $unit_count;
    }

    public function render()
    {
        return view('livewire.unit-component');
    }
}
