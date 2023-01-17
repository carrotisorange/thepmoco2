<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;
use Session;

class ContractMoveoutStep3Component extends Component
{
    public $contract;

    public function exportMoveoutClearanceForm(){
       dd('asdasasd');
    }

    public function submitForm(){
        sleep(1);

        Contract::where('uuid', $this->contract->uuid)
        ->update([
            'status' => 'inactive'
        ]);

        return redirect('/property/'.Session::get('property').'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-4')->with('success', 'Step 3 of 4 has been accomplished!');        
    }

    public function render()
    {
        return view('livewire.contract-moveout-step3-component');
    }
}
