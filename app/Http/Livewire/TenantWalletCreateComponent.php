<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wallet;

class TenantWalletCreateComponent extends Component
{
    public $tenant;

    public $description;
    public $amount;

    protected function rules()
      {
        return [
          'description' => 'required',
          'amount' => 'required',
        ];
      }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm(){

        

        $this->validate();

        app('App\Http\Controllers\TenantWalletController')->store($this->tenant->uuid, $this->amount, $this->description);

        $this->reset_form();
        
        return session()->flash('success', 'Changes Saved!');
    }

    public function reset_form(){
      $this->description = '';
      $this->amount = '';
    }

    public function remove($deposit_id){
       Wallet::where('id', $deposit_id)->delete();

       return session()->flash('success', 'Changes Saved!');
    }
    
    public function render()
    {
        return view('livewire.tenant-wallet-create-component',[
            'wallets' => app('App\Http\Controllers\TenantWalletController')->index($this->tenant->uuid)
        ]);
    }
}
