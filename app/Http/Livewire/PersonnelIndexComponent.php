<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Session;
use App\Models\{UserProperty,Type};

class PersonnelIndexComponent extends Component
{
    use WithPagination;

    public $search;
    public $status;

   public function submitForm(){
      return redirect('/property/'.Session::get('property_uuid').'/user/'.Str::random(8).'/create');
   }

   public function render()
   {
      $personnels = UserProperty::where('property_uuid', Session::get('property_uuid'))
      ->whereNotIn('user_id', [auth()->user()->id, '97'])
      ->endUser()
      ->get();

    $propertyPersonnelsCount = UserProperty::where('property_uuid', Session::get('property_uuid'))->where('role_id','!=', 5)->count();

    $stepper = Type::where('id', Session::get('property_type_id'))->pluck('stepper')->first();

    $steps = explode(",", $stepper);

     return view('livewire.personnel-index-component', [
        'personnels' => $personnels,
        'propertyPersonnelsCount' => $propertyPersonnelsCount,
        'statuses' => app('App\Http\Controllers\UserPropertyController')->get_user_statuses(Session::get('property_uuid')),
        'steps' => $steps
      ]);
   }
}
