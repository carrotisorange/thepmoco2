<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Session;

class UserIndexComponent extends Component
{
    public $search = null;

   public function render()
   {
        return view('livewire.user-index-component', [
        'users' => app('App\Http\Controllers\UserPropertyController')->show_property_users(Session::get('property')),
        
        
        // User::search($this->search)
        // ->orderBy('created_at', 'asc')
        // ->paginate(10)
   ]);
   }
}
