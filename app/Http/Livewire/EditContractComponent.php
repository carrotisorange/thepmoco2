<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;
use App\Models\Interaction;
use App\Models\Property;
use Carbon\Carbon;
use App\Models\Unit;

class EditContractComponent extends Component
{
    public Contract $contract;

    //input variables
    public $unit_uuid;
    public $start;
    public $end;
    public $status;
    public $rent;
    public $interaction_id;

    public function mount($contract){
        $this->unit_uuid = $contract->unit_uuid;
        $this->start = Carbon::parse($contract->start)->format('Y-m-d');
        $this->end = Carbon::parse($contract->end)->format('Y-m-d');
        $this->status = $contract->status;
        $this->rent = $contract->rent;
        $this->interaction_id = $contract->interaction_id;
    }

    public function updatedUnitUuid(){
        $this->rent = Unit::find($this->unit_uuid)->rent;
    }
    
    protected function rules()
    {
        return [
            // 'contract' => 'nullable|mimes:jpg,bmp,png,pdf,docx|max:10240',
            'unit_uuid' => 'required',
            'start' => 'required|date',
            'rent' => 'required',
            'end' => 'required',
            'status' => 'required',
            'interaction_id' => 'nullable'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateContract(){
        sleep(2);

        try{
            $validated = $this->validate();
        }catch(\Exception $e){
            ddd($e);
        }

        Contract::where('uuid', $this->contract->uuid)
        ->update($validated);

        return redirect('/property/'.$this->contract->property_uuid.'/contract')->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.edit-contract-component',[
            'units' => Property::find($this->contract->property_uuid)->units,
            'interactions' => Interaction::all()
        ]);
    }
}
