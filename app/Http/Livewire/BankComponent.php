<?php

namespace App\Http\Livewire;
use App\Models\Bank;
use App\Models\DeedOfSale;
use Illuminate\Support\Str;
use DB;
use Session;

use Livewire\Component;

class BankComponent extends Component
{
   public $unit;
   public $owner;


   public $account_name;
   public $bank_name;
   public $account_number;

   public $is_the_property_on_loan;
   public $financing_company;
   public $turnover_at;
   public $price;


   public function mount($unit, $owner)
   {
      $this->unit = $unit;
      $this->is_the_property_on_loan = false;
      $this->account_name = $owner->owner;
   }

   protected function rules()
   {
      return [
         'is_the_property_on_loan' => 'nullable',
         'financing_company' => 'nullable',
         'price' => 'nullable',
         'turnover_at' => 'required|date',
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
           DB::transaction(function () use ($validatedData){

               $this->update_deed_of_sale($validatedData);

               $this->store_bank($this->bank_name, $this->account_name, $this->account_number, $this->owner->uuid);
               
           });

         return redirect('/property/'.Session::get('property').'/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/occupancy/create')->with('success', 'Bank is successfully created.');
      }
      catch(\Exception $e)
      {
         return back()->with('error');
      }

   }

   public function update_deed_of_sale($validatedData)
   {
      DeedOfSale::where('unit_uuid', $this->unit->uuid)
      ->where('owner_uuid', $this->owner->uuid)
      ->update([
         'is_the_property_on_loan' => $this->is_the_property_on_loan,
         'financing_company' => $this->financing_company,
         'price' => $this->price,
         'turnover_at' => $this->turnover_at
      ]);
   }

   public function store_bank($bank_name, $account_name, $account_number, $owner_uuid)
   {  
      Bank::create([
         'bank_name' => $bank_name,
         'account_name' => $account_name, 
         'account_number' => $account_number,
         'owner_uuid' => $owner_uuid
      ]);
   }

   public function render()
   {
      return view('livewire.bank-component');
   }
}
