<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UnitInventory;

class UnitInventoryUploadImageComponent extends Component
{

    use WithFileUploads;

    public $unit;
    public $unit_inventory;

    public $image;

    protected function rules()
    {
        return [
           'image' => 'nullable | mimes:jpg,bmp,png, jpeg | max:102400',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function submitForm(){



        $this->validate();

        if ($this->image === null) {
            $image = $this->unit_inventory->image;
        }else{
            $image = $this->image->store('unit_inventories');
        }

        UnitInventory::where('id', $this->unit_inventory->id)
        ->update([
            'image' => $image
        ]);

         return redirect('/property/'.$this->unit->property_uuid.'/unit/'.$this->unit->uuid.'/inventory/'.$this->unit_inventory->id)->with('success', 'Changes Saved!');

        // session()->flash('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.unit-inventory-upload-image-component');
    }
}
