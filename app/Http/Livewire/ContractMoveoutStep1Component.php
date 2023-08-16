<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\Tenant;
use DB;

class ContractMoveoutStep1Component extends Component
{
    public $contract;
    public $sendContract;

    public $moveout_at;
    public $moveout_reason;
    public $tenant;
    public $unit;
    public $bank_name;
    public $account_name;
    public $account_number;
    public $contact_number;

    public $unpaid_bills;

    public function mount($contract)
    {
        $this->contract = $contract;
        $this->moveout_at = Carbon::now()->addYear()->format('Y-m-d');
        $this->moveout_reason = $contract->moveout_reason;
        $this->tenant = $contract->tenant->tenant;
        $this->unit = $contract->unit->building->building.' '.$contract->unit->unit;
        $this->unpaid_bills = Tenant::find($this->contract->tenant->uuid)->bills()->whereIn('status', ['unpaid', 'partially_paid'])->sum(DB::raw('bill-initial_payment'));
        $this->bank_name = $contract->bank_name;
        $this->account_name = $contract->account_name;
        $this->account_number = $contract->account_number;
        $this->contact_number = $contract->contact_number;
    }

    protected function rules()
    {
         return [
            'moveout_at' => 'required',
            'moveout_reason' => 'required',
            'bank_name' => 'nullable',
            'account_name' => 'nullable',
            'account_number' => 'nullable',
            'contact_number' => 'nullable'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $validatedData = $this->validate();
   
        if(auth()->user()->role_id == '8'){
            
            $validatedData['status'] = 'pendingmoveout';

            $this->contract->update($validatedData);

            // app('App\Http\Controllers\NotificationController')->store('concern', 'requested to moveout', 'pending', Tenant::find($this->contract->tenant_uuid)->property->uuid);

            return redirect('/8/tenant/'.auth()->user()->username.'/contracts/')->with('success', 'Success!');

        }else{  
            if(!$this->unpaid_bills > 0){
            
                $validatedData['status'] = 'active';

            } else{
                $validatedData['status'] = 'pendingmoveout';

            }   
            
        $this->contract->update($validatedData);

         return redirect('/property/'.Session::get('property').'/tenant/'.$this->contract->tenant_uuid.'/contract/'.$this->contract->uuid.'/moveout/step-3')->with('success', 'Success!');        
        }
       
    }

    public function render()
    {
        return view('livewire.contract-moveout-step1-component',[
            'unpaid_bills' => $this->unpaid_bills
        ]);
    }
}

