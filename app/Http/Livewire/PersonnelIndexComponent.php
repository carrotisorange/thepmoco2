<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserProperty;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class PersonnelIndexComponent extends Component
{
    use WithPagination;

    public $property;
    public $search;
    public $status;

   public function submitForm(){      
      return redirect('/property/'.$this->property->uuid.'/user/'.Str::random(8).'/create');
   }

   public function render()
   {
      $personnels = UserProperty::where('property_uuid', $this->property->uuid)->whereNotIn('user_id', [auth()->user()->id, '97'])->get();

     return view('livewire.personnel-index-component', [
        'personnels' => $personnels,
        'statuses' => app('App\Http\Controllers\UserPropertyController')->get_user_statuses($this->property->uuid),
      ]);
   }
}
