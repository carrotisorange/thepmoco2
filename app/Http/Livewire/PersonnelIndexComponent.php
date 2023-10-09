<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserProperty;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Session;

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
      // ->approved()
      ->get();

     return view('livewire.personnel-index-component', [
        'personnels' => $personnels,
        'statuses' => app('App\Http\Controllers\UserPropertyController')->get_user_statuses(Session::get('property_uuid')),
      ]);
   }
}
