<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\Tenant;
use DB;
use App\Models\Contract;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Collection;

class ContractMoveoutStep3Component extends Component
{
    public $contract;

    public $bills;

    public $tenant_uuid;

    public $view = 'listView';

    public $isPaymentAllowed = false;

    public $isIndividualView = true;

    public $user_type = 'tenant';

    public $remarks;

    public function mount($contract)
    {
        $this->bills = Bill::where('tenant_uuid',$this->contract->tenant->uuid)->where('status', 'unpaid')->get();
        $this->tenant_uuid = $contract->tenant_uuid;
        $this->remarks = $contract->remarks;
    }

    public function forcedMoveout(){

        $this->validate([
          'remarks' => 'required',
        ]);

        Contract::where('uuid', $this->contract->uuid)
        ->update([
            'status' => 'forcedmoveout',
            'remarks' => $this->remarks
        ]);

        Tenant::where('uuid', $this->contract->tenant_uuid)
        ->update([
            'status' => 'forcedmoveout'
        ]);

        return redirect('/property/'.Session::get('property_uuid').'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-4')->with('success','Changes Saved!');
    }

    public function submitForm()
    {
        Contract::where('uuid', $this->contract->uuid)
        ->update([
            'status' => 'cleared'
        ]);

        Tenant::where('uuid', $this->contract->tenant_uuid)
        ->update([
            'status' => 'cleared'
        ]);

        return redirect('/property/'.Session::get('property_uuid').'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-4')->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.contract-moveout-step3-component',[
            'deposits' => $this->bills->sum('bill')-Collection::where('tenant_uuid', $this->contract->tenant_uuid)->posted()->deposit()->sum('collection')
        ]);
    }
}
