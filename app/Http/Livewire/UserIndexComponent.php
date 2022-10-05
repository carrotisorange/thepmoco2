<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;

class UserIndexComponent extends Component
{
    public $search = null;
    public $status = '';

   public function render()
   {
     return view('livewire.user-index-component', [
        'users' => app('App\Http\Controllers\UserPropertyController')->get_property_users(Session::get('property')),
        'statuses' => app('App\Http\Controllers\UserPropertyController')->get_user_statuses(Session::get('property')),
      ]);
   }
}
