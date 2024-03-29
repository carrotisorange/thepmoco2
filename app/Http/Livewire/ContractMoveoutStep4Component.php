<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Contract,Tenant};

class ContractMoveoutStep4Component extends Component
{
    public $tenant;
    public $contract;

    public $request_for = 'refund';


    public function exportMoveoutClearanceForm(){



        return redirect('/property/'.Session::get('property_uuid').'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-3/export')->with('success', 'Changes Saved!');

    }

    public function submitForm(){



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

         $deposits = Tenant::find($this->contract->tenant_uuid)->bills->whereIn('particular_id',[3,4] )->where('status', 'unpaid')->count();

         if($deposits){
            return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->request_for.'/step-1')->with('success', 'Changes Saved!');
         }else{
            return redirect('/property/'.Session::get('property_uuid').'/tenant/'.$this->contract->tenant_uuid.'/contracts')->with('success', 'Changes Saved!');
         }


    }

    public function render()
    {
        return view('livewire.contract-moveout-step4-component');
    }
}
