<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contract;
use Carbon\Carbon;
use Session;
use App\Models\Tenant;
use App\Models\Notification;

class MoveoutContractComponent extends Component
{
    public $contract;
    public $sendContract;

    public $moveout_at;
    public $moveout_reason;
    public $tenant;
    public $unit;

    public function mount($contract)
    {
        $this->contract = $contract;
        $this->moveout_at = Carbon::now()->addYear()->format('Y-m-d');
        $this->moveout_reason = $contract->moveout_reason;
        $this->tenant = $contract->tenant->tenant;
        $this->unit = $contract->unit->building->building.' '.$contract->unit->unit;
    }

  

    protected function rules()
    {
         return [
            'moveout_at' => 'required',
            'moveout_reason' => 'required',
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
   
        if(auth()->user()->role_id == '8'){
            
            $validatedData['status'] = 'pendingmoveout';

            $this->contract->update($validatedData);

            // app('App\Http\Controllers\NotificationController')->store('concern', 'requested to moveout', 'pending', Tenant::find($this->contract->tenant_uuid)->property->uuid);

            return redirect('/8/tenant/'.auth()->user()->username.'/contracts/')->with('success', 'Contract moveout has been requested.');

        }else{  
            $validatedData['status'] = 'inactive';

            $this->contract->update($validatedData);

            // app('App\Http\Controllers\NotificationController')->store('concern', 'has been approved to moveout', 'approved', Tenant::find($this->contract->tenant_uuid)->property->uuid);

            return redirect('/property/'.Session::get('property').'/tenant/'.$this->contract->tenant_uuid.'/contracts')->with('success', 'Contract has been moveout.');
        }
       
    }

    public function render()
    {
        return view('livewire.moveout-contract-component');
    }
}
