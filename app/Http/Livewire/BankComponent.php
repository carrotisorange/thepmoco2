<?php

namespace App\Http\Livewire;
use App\Models\Bank;
use App\Models\Owner;
use Illuminate\Support\Str;
use DB;

use Livewire\Component;

class BankComponent extends Component
{
   public $unit;
   public $owner;


   public $account_name;
   public $bank_name;
   public $account_number;


   public function mount($unit, $owner)
   {
      $this->unit = $unit;
      $this->account_name = $owner->owner;
      $this->banks = $this->get_banks();
   }

   public function get_banks()
   {
      return  Owner::find($this->owner->uuid)->banks;
   }

   public function removeBank($id)
     {
        Bank::destroy($id);

        $this->banks = $this->get_banks();

        return back()->with('success', 'Bank is successfully removed');
     }

   
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

      try{

         DB::beginTransaction();

         $this->store_bank($validatedData);

         DB::commit();

         $this->resetForm();

         $this->banks = $this->get_banks();

         return back()->with('success', 'Bank is successfully created.');
      }
      catch(\Exception $e)
      {
         DB::rollback();

         return back()->with('error');
      }

   }

   public function store_bank($validatedData)
   {
      $validatedData['owner_uuid'] = $this->owner->uuid;
      
      Bank::create($validatedData);
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
