<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UnitInventory;

class UnitInventoryComponent extends Component
{
    public $unitDetails;

    public $batch_no;

    public $inventories;

    protected function rules()
    {
        return [
            'inventories.*.item' => 'nullable',
            'inventories.*.quantity' => 'nullable',
            'inventories.*.remarks' => 'nullable',
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }

    public function updateUnitInventory($id){
        
        // sleep(1);

        // $this->validate();

       try{
            foreach ($this->inventories->where('id', $id) as $inventory) {
                UnitInventory::where('unit_uuid', $this->unitDetails->uuid)
                ->where('id', $id)
                ->update([
                    'item' => $inventory->item,
                    'quantity' => $inventory->quantity,
                    'remarks' => $inventory->remarks,
                ]);

                
            }

            session()->flash('success', 'Inventory is successfully updated!');
            
       }catch(\Exception $e){
            session()->flash('error', $e);
       }


    }

    public function addNewUnitInventory(){

        sleep(1);

        UnitInventory::create(
            [
                'unit_uuid' => $this->unitDetails->uuid,
                'user_id' => auth()->user()->id,
                'batch_no' => $this->batch_no
            ]
        );

        session()->flash('success', 'New Inventory row is added successfully!');
    }

    public function removeUnitInventory($id){
        sleep(2);

        UnitInventory::where('id', $id)->delete();
        
        session()->flash('success', 'Inventory is successfully removed!');
    }

    public function exportUnitInventory(){
        sleep(2);

        return redirect('/property/'.$this->unitDetails->property_uuid.'/unit/'.$this->unitDetails->uuid.'/inventory/export');
    }

    public function redirectToTheUnitPage(){
        
        sleep(2);

        return redirect('/property/'.$this->unitDetails->property_uuid.'/unit/'.$this->unitDetails->uuid);
    }
    
    public function get_inventories(){
        return UnitInventory::where('unit_uuid', $this->unitDetails->uuid)
        ->orderBy('created_at', 'desc')
        ->get();
    }
    
    public function render()
    {
        $this->inventories = $this->get_inventories();

        return view('livewire.unit-inventory-component');
    }
}
