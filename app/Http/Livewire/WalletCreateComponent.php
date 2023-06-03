<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wallet;

class WalletCreateComponent extends Component
{
    public $unit;
    public $tenant;
    public $contract;

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

        app('App\Http\Controllers\WalletController')->store($this->tenant->uuid, $this->contract->uuid, $this->amount, $this->description);

        $this->reset_form();
        
        return session()->flash('success', 'Success!');
    }

    public function reset_form(){
      $this->description = '';
      $this->amount = '';
    }

    public function remove($deposit_id){
       Wallet::where('id', $deposit_id)->delete();

       return session()->flash('success', 'Success!');
    }
    
    public function render()
    {
        return view('livewire.wallet-create-component',[
            'deposits' => app('App\Http\Controllers\WalletController')->index($this->contract->uuid)
        ]);
    }
}
