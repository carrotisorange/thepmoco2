<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UnitInventory;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


class UnitInventoryComponent extends Component
{
    use WithFileUploads;

    public $unitDetails;

    public $batch_no;

    public $inventories;

    public $ismovein;

    public $tenant;

    public $contract;

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

       try{
            foreach ($this->inventories->where('id', $id) as $inventory) {
                UnitInventory::where('unit_uuid', $this->unitDetails->uuid)
                ->where('id', $id)
                ->update([
                    'item' => $inventory->item,
                    'quantity' => $inventory->quantity,
                    'remarks' => $inventory->remarks,
                    'updated_at' => Carbon::now()
                ]);

            session()->flash('success', 'Inventory is successfully updated!');
            }
            
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

        sleep(1);

        UnitInventory::where('id', $id)->delete();
        
        session()->flash('success', 'Inventory is successfully removed!');
    }


    public function redirectToTheUnitPage(){
        
        sleep(2);

        return redirect('/property/'.$this->unitDetails->property_uuid.'/unit/'.$this->unitDetails->uuid);
    }

    public function submitForm(){
        sleep(1);


        UnitInventory::where('unit_uuid', $this->unitDetails->uuid)
        ->update([
            'contract_uuid' => $this->contract->uuid
        ]);

        return redirect('/property/'.$this->unitDetails->property_uuid.'/unit/'.$this->unitDetails->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$this->contract->uuid.'/bill/'.Str::random(8).'/create')->with('success', 'Unit Inventory is successfully created.');
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