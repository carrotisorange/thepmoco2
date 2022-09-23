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

    public function mount($contract)
    {
        $this->contract = $contract;
        $this->moveout_at = Carbon::now()->addYear()->format('Y-m-d');
    }

    public $moveout_at;
    public $moveout_reason;

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

             Notification::create([
              'type' => 'concern',
              'user_id' => auth()->user()->id,
              'details' => 'requested to moveout.',
              'status' => 'pending',
              'role_id' => auth()->user()->role_id,
              'property_uuid' => Tenant::find($this->contract->tenant_uuid)->property->uuid
            ]);

            return redirect('/8/tenant/'.auth()->user()->username.'/contracts/')->with('success', 'Contract moveout has been requested.');


        }else{  
            $validatedData['status'] = 'inactive';

            $this->contract->update($validatedData);

            Notification::create([
              'type' => 'concern',
              'user_id' => auth()->user()->id,
              'details' => 'been approved to moveout.',
              'status' => 'approved',
              'role_id' => auth()->user()->role_id,
              'property_uuid' => Tenant::find($this->contract->tenant_uuid)->property->uuid
            ]);

            return redirect('/property/'.Session::get('property').'/tenant/'.$this->contract->tenant_uuid.'/contracts')->with('success', 'Contract has been moveout.');
        }
       
    }

    
    public function render()
    {
        return view('livewire.moveout-contract-component');
    }
}
