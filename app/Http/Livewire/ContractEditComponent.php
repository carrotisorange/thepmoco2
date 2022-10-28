<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use DB;
use Session;
use App\Models\Contract;

use Livewire\Component;

class ContractEditComponent extends Component
{
    use WithFileUploads;

    public $contract_details;

    public $contract;
    public $start;
    public $end;

    public $tenant;

    public function mount($contract_details)
    {
        $this->tenant = $contract_details->tenant->uuid;
        $this->contract = $contract_details->contract;
        $this->start = $contract_details->start;
        $this->end = $contract_details->end;
    }
    
    protected function rules()
    {
        return [
            'contract' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'start' => 'required|date',
            'end' => 'required|date',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        sleep(1);

         $validatedData = $this->validate();

        try{
            
            DB::transaction(function () use ($validatedData){
                $this->contract_details->update($validatedData);
            });

           if($this->contract){
                Contract::where('uuid', $this->contract_details->uuid)
                ->update([
                    'contract' => $this->contract->store('contracts'),
                ]);
           }

            session()->flash('success', 'Tenant details is successfully updated.');

        }catch(\Exception $e)
        {
           session()->flash('error');
        }
    }

    public function removeContract()
    {
        $this->contract = '';
    }

    public function render()
    {
        return view('livewire.contract-edit-component');
    }
}
