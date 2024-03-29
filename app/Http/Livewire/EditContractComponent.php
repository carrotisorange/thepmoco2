<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\{Tenant,Contract,Interaction,Property,Unit};

class EditContractComponent extends Component
{
    public $contract;

    use WithFileUploads;

    //input variables
    public $unit_uuid;
    public $start;
    public $end;
    public $status;
    public $rent;
    public $interaction_id;
    public $updateTenantStatus = true;

    public $tenant_contract;

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

        try {

        $validatedData = $this->validate();

            if($this->updateTenantStatus){

            Tenant::where('uuid', $this->contract->tenant_uuid)
                ->update(['status'=> $this->status]);
            }

            if ($this->tenant_contract === null) {
                $tenant_contract = $this->contract->contract;
            }else{
                $tenant_contract = $this->tenant_contract->store('contracts');
            }

            $validatedData['contract'] = $tenant_contract;

            Contract::where('uuid', $this->contract->uuid)
            ->update($validatedData);

            return redirect(url()->previous())->with('success', 'Changes Saved!');

          }catch (\Exception $e) {

            return redirect(url()->previous())->with('error', $e);
        }


    }

    public function render()
    {
        return view('livewire.edit-contract-component',[
            'units' => Property::find($this->contract->property_uuid)->units,
            'interactions' => Interaction::all()
        ]);
    }
}
