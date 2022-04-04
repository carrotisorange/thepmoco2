<?php

namespace App\Http\Livewire;
use App\Models\Bank;
use Illuminate\Support\Str;

use Livewire\Component;

class BankComponent extends Component
{
   public $unit;
   public $owner;
   public $banks;

   public function mount($unit, $owner, $banks)
   {
   $this->unit = $unit;
   $this->owner = $owner;
   $this->banks = $banks;
   }

   public $account_name;
   public $bank_name;
   public $account_number;

   protected function rules()
   {
   return [
    'account_name' => 'required',
    'bank_name' => 'required',
    'account_number' => 'required',
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
   $validatedData['owner_uuid'] = $this->owner->uuid;
   Bank::create($validatedData);

   $this->resetForm();

   return
   redirect('/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/bank/'.Str::random(8).'/create')->with('success',
   'Bank has been created.');
   }

   public function resetForm()
   {
      $this->account_name='';
      $this->bank_name='';
      $this->account_number='';
   }

   public function render()
   {
      return view('livewire.bank-component');
   }
}
