<?php

namespace App\Http\Livewire;
use App\Models\DeedOfSale;
use Session;
use DB;

use Livewire\Component;

class OccupancyComponent extends Component
{
    public $unit;
    public $owner;

    public $is_the_unit_for_rent_to_tenant;

    public function mount(){
        $this->is_the_unit_for_rent_to_tenant = false;
    }

    protected function rules()
   {
      return [
         'is_the_unit_for_rent_to_tenant' => 'nullable',
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
             $this->update_deed_of_sales($validatedData);
         });

         return redirect('/property/'.Session::get('property').'/owner/'.$this->owner->uuid)->with('success', 'Occupancy is successfully created.');
         }
         catch(\Exception $e)
         {
            ddd($e);
            return back()->with('error');
         }
        
    }

    public function update_deed_of_sales($validatedData)
    {
         DeedOfSale::where('unit_uuid', $this->unit->uuid)
         ->where('owner_uuid', $this->owner->uuid)
         ->update([
            'is_the_unit_for_rent_to_tenant' => $this->is_the_unit_for_rent_to_tenant
         ]);
    }

    public function render()
    {
        return view('livewire.occupancy-component');
    }
}
