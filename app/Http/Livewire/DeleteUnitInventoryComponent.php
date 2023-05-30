<?php

namespace App\Http\Livewire;

use App\Models\UnitInventory;
use Livewire\Component;

class DeleteUnitInventoryComponent extends Component
{
    public $inventory;

    public function deleteUnitInventory(){
       
        UnitInventory::where('id', $this->inventory->id)->delete();

        return redirect(url()->previous())->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.delete-unit-inventory-component');
    }
}
