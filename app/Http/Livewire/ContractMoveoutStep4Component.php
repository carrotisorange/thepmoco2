<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;
use App\Models\Tenant;

class ContractMoveoutStep4Component extends Component
{
    public $property;
    public $tenant;
    public $contract;

    public $request_for = 'refund';

    public function exportMoveoutClearanceForm(){

        sleep(2);
       
        return redirect('/property/'.$this->property->uuid.'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-3/export')->with('success', 'Tenant has been moved out!');        
    
    }

    public function submitForm(){
        
        sleep(2);
        
         Contract::where('uuid', $this->contract->uuid)
         ->update([
         'status' => 'inactive'
         ]);

         $contracts = Tenant::find($this->contract->tenant_uuid)->contracts->where('status', 'active')->count();

         if(!$contracts){
            Tenant::where('uuid', $this->contract->tenant_uuid)
            ->update([
                'status' => 'inactive'
            ]);
         }
         
         $deposits = Tenant::find($this->contract->tenant_uuid)->bills->whereIn('particular_id',[3,4] )->whereIn('status', ['unpaid', 'partially_paid'])->count();

         if($deposits){
            return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->request_for.'/step-1')->with('success', 'Step 3 of 4 has been accomplished!');     
         }else{
            return redirect('/property/'.$this->property->uuid.'/tenant/'.$this->contract->tenant_uuid.'/contracts')->with('success', 'Tenant has been moved out!');     
         }

           
    }

    public function render()
    {
        return view('livewire.contract-moveout-step4-component');
    }
}