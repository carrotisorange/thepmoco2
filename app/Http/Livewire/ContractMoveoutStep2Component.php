<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\Tenant;
use DB;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractMoveoutStep2Component extends Component
{
    public $contract;

    public $unpaid_bills;

    public function mount($contract)
    {
        $this->unpaid_bills = Tenant::find($this->contract->tenant->uuid)->bills()->whereIn('status', ['unpaid', 'partially_paid'])->get();
    }

    public function skipUnitInventoryProcess()
    {
        sleep(1);

        return redirect('/property/'.Session::get('property').'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-3')->with('success', 'Step 2 of 5 has been accomplished!');        
    }

    public function render()
    {
        return view('livewire.contract-moveout-step2-component');
    }
}
