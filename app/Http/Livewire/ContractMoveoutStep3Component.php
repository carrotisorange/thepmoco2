<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\Tenant;
use DB;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractMoveoutStep3Component extends Component
{
    public $contract;

    public $unpaid_bills;

    public function mount($contract)
    {
        $this->unpaid_bills = Tenant::find($this->contract->tenant->uuid)->bills()->whereIn('status', ['unpaid', 'partially_paid'])->get();
    }

    public function submitForm()
    {
        sleep(1);

        Contract::where('uuid', $this->contract->uuid)
        ->update([
            'status' => 'cleared'
        ]);

        Tenant::where('uuid', $this->contract->tenant_uuid)
        ->update([
            'status' => 'cleared'
        ]);

        return redirect('/property/'.Session::get('property').'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-4')->with('success', 'Success!');        
    }

    public function exitModal(){

        return redirect('/property/'.Session::get('property').'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-4')->with('success', 'Success!');  
    }

    public function render()
    {
        return view('livewire.contract-moveout-step3-component',[
            'deposits' => Contract::find($this->contract->uuid)->wallets()->sum('amount')
        ]);
    }
}
