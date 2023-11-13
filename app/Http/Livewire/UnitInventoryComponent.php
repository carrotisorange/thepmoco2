<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\UnitInventory;

class UnitInventoryComponent extends Component
{
    use WithFileUploads;

    public $unitDetails;

    public $batch_no;

    public $inventories;

    public $ismovein;

    public $tenant;

    public $contract;

    public function mount(){
        $this->inventories = $this->get_inventories();
    }

    protected function rules()
    {
        return [
            'inventories.*.item' => 'required',
            'inventories.*.quantity' => 'nullable',
            'inventories.*.remarks' => 'nullable',
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }

    public function updateUnitInventory($id){

        $this->validate();

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
            }

            session()->flash('success', 'Changes Saved!');

            $this->inventories = $this->get_inventories();

       }catch(\Exception $e){
            return redirect(url()->previous())->with('error', $e);
       }


    }


    public function uploadImage($id){



        return redirect('/property/'.$this->unitDetails->property_uuid.'/unit/'.$this->unitDetails->uuid.'/inventory/'.$id);
    }

     public function skipUnitInventoryProcess()
    {


        return
        redirect('/property/'.$this->unitDetails->property_uuid.'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-2')->with('success',
        'Changes Saved!');
    }

    public function addNewUnitInventory(){



        UnitInventory::create(
            [
                'unit_uuid' => $this->unitDetails->uuid,
                'user_id' => auth()->user()->id,
                'batch_no' => $this->batch_no
            ]
        );

        session()->flash('success', 'Changes Saved!');
    }

    public function removeUnitInventory($id){



        UnitInventory::where('id', $id)->delete();

        session()->flash('success', 'Changes Saved!');
    }


    public function redirectToTheUnitPage(){



        return redirect('/property/'.$this->unitDetails->property_uuid.'/unit/'.$this->unitDetails->uuid);
    }

    public function submitForm(){


        // UnitInventory::where('unit_uuid', $this->unitDetails->uuid)
        // ->update([
        //     'contract_uuid' => $this->contract->uuid
        // ]);

        foreach($this->inventories as $key => $inventory )
        {
            $inventory->replicate()->fill(
                [
                    'contract_uuid' => $this->contract->uuid
                ]
            )->save();
       }

        return redirect('/property/'.$this->unitDetails->property_uuid.'/unit/'.$this->unitDetails->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$this->contract->uuid.'/bill/'.Str::random(8).'/create')->with('success', 'Changes Saved!');
    }

    public function get_inventories(){
        return UnitInventory::where('unit_uuid', $this->unitDetails->uuid)
        ->where('contract_uuid', '')
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function render()
    {
        return view('livewire.unit-inventory-component');
    }
}
