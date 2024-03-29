<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UnitInventory;

class CreateUnitInventoryComponent extends Component
{
    public $unit;

    public $item;
    public $quantity;
    public $remarks;
    public $image;

    protected function rules()
    {
        return [
            'item' => 'required',
            'quantity' => 'required',
            'remarks' => 'nullable',
            // 'image' => 'nullable | mimes:jpg,png|max:102400',
            ];
    }

    public function updated($propertyName)
    {
       $this->validateOnly($propertyName);
    }

    public function submitButton()
    {
        $validated = $this->validate();

        $validated['unit_uuid'] = $this->unit->uuid;

        UnitInventory::create($validated);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.create-unit-inventory-component');
    }
}
