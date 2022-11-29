<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\UserProperty;
use Livewire\WithPagination;

class UserIndexComponent extends Component
{
    use WithPagination;

    public $search;
    public $status;

   public function render()
   {
      $personnels = UserProperty::join('users', 'user_id', 'users.id')
      ->join('properties', 'property_uuid', 'properties.uuid')
      ->select('*')
      ->where('property_uuid', Session::get('property'))
      ->when($this->search, function($query){
      $query->where('name','like', '%'.$this->search.'%');
      })
      ->when($this->status, function($query){
      $query->where('users.status', $this->status);
        })
     ->paginate(10);
      
     return view('livewire.user-index-component', [
        'personnels' => $personnels,
        'statuses' => app('App\Http\Controllers\UserPropertyController')->get_user_statuses(Session::get('property')),
      ]);
   }
}
