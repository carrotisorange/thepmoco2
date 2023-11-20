<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UnitInventory;

class DeleteUnitInventoryComponent extends Component
{
    public $inventory;

    public function deleteUnitInventory(){

        UnitInventory::where('id', $this->inventory->id)->delete();

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.delete-unit-inventory-component');
    }
}
