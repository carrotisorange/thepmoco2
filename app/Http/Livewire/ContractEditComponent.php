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

    public $tenant;

    public function mount($contract_details)
    {
        $this->tenant = $contract_details->tenant->uuid;
    }
    
    protected function rules()
    {
        return [
        'contract' => 'required | mimes:jpg,bmp,png,pdf,docx|max:1024',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        sleep(1);

         $validated_data = $this->validate();

        try{
           
            DB::beginTransaction();

            Contract::where('uuid', $this->contract_details->uuid)
            ->update([
                'contract' => $this->contract->store('contracts')
            ]);

            DB::commit();

            return redirect('/property/'.Session::get('property').'/tenant/'.$this->contract_details->tenant_uuid)->with('success', 'Tenant details is successfully updated.');

        }catch(\Exception $e)
        {
            DB::rollback();

<<<<<<< Updated upstream
            ddd($e);

            return back()->with('error','Cannot complete your action.');
=======
           session()->flash('error');
>>>>>>> Stashed changes
        }
    }


    public function render()
    {
        return view('livewire.contract-edit-component');
    }
}
