<?php

namespace App\Http\Livewire;

use Session;
use DB;
use App\Models\Unit;

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


        $validatedData = $this->validate();

         try{
         DB::transaction(function () use ($validatedData){
             $this->update_deed_of_sales($validatedData);
         });

         return redirect('/property/'.Session::get('property_uuid').'/owner/'.$this->owner->uuid)->with('success', 'Changes Saved!');
         }
         catch(\Exception $e)
         {
            return back()->with('error',$e);
         }

    }

    public function update_deed_of_sales($validatedData)
    {
         Unit::where('uuid', $this->unit->uuid)
         ->update([
            'is_the_unit_for_rent_to_tenant' => $this->is_the_unit_for_rent_to_tenant
         ]);
    }

    public function render()
    {
        return view('livewire.occupancy-component');
    }
}
