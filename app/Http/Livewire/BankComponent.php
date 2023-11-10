<?php

namespace App\Http\Livewire;

use DB;
use Session;
use Livewire\Component;
use App\Models\{Unit,DeedOfSale};

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
         'financing_company' => ['required_if:is_the_property_on_loan,true'],
         'price' => 'nullable',
         'turnover_at' => 'nullable|date',
      ];
   }

   public function updated($propertyName)
   {
      $this->validateOnly($propertyName);
   }

   public function submitForm()
   {


      $validatedData = $this->validate();

      try{
           DB::transaction(function () use ($validatedData){

               $this->update_deed_of_sale($validatedData);

               $this->update_unit();

               if($this->bank_name)
               {
                  app('App\Http\Controllers\BankController')->store($this->bank_name, $this->account_name, $this->account_number, $this->owner->uuid);
               }
           });

         return redirect('/property/'.Session::get('property_uuid').'/unit/'.$this->unit->uuid.'/owner/'.$this->owner->uuid.'/occupancy/create')->with('success', 'Changes Saved!');
      }
      catch(\Exception $e)
      {
         return back()->with('error');
      }

   }

   public function update_unit()
    {
        Unit::where('uuid', $this->unit->uuid)
        ->update([
            'price' => $this->price
        ]);

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

   public function render()
   {
      return view('livewire.bank-component');
   }
}
