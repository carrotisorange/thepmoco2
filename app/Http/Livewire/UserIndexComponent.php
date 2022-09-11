<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserProperty;
use Livewire\Component;
use Session;

class UserIndexComponent extends Component
{
    public $search = null;
    public $status = '';

   public function render()
   {

     $statuses = UserProperty::join('users', 'user_id', 'users.id')
      ->where('property_uuid', Session::get('property'))
      ->groupBy('users.status')
      ->get();

     return view('livewire.user-index-component', [
        'users' => app('App\Http\Controllers\UserPropertyController')->show_property_users(Session::get('property')),
        'statuses' => $statuses
        
        
        // User::search($this->search)
        // ->orderBy('created_at', 'asc')
        // ->paginate(10)
   ]);
   }
}
