<?php

namespace App\Http\Livewire;

use Session;
use Livewire\Component;
use App\Models\{PropertyParticular,Particular};

class ParticularCreateComponent extends Component
{
    public $guest;

    public $particular;

    protected function rules()
    {
      return [
         'particular' => 'required'
      ];
    }

    public function updated($propertyName)
    {
      $this->validateOnly($propertyName);
    }

    public function submitButton(){
        $validated = $this->validate();

        $is_particular_exists = Particular::where('particular', $this->particular)->pluck('id')->first();

        if($is_particular_exists){
          $particular_id = $is_particular_exists;
        }else{
          $particular_id = Particular::create([
            'particular' => strtolower($this->particular)
          ])->id;
        }

        PropertyParticular::updateOrCreate(
        [
           'property_uuid'=> Session::get('property_uuid'),
           'particular_id'=> $particular_id,
        ]
        ,
        [
            'property_uuid'=> Session::get('property_uuid'),
            'particular_id'=> $particular_id,
            'minimum_charge' => 0.00,
            'due_date' => 28,
            'surcharge' => 1
        ]
      );

         return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.particular-create-component');
    }
}
