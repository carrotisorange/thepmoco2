<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\UserProperty;
use Auth;

use Livewire\Component;

class PropertyIndexComponent extends Component
{
    public $property;
    public $sortBy =  'name';
    
    public function render()
    {
        return view('livewire.property-index-component',[
            'portforlio'=> $this->get_properties(Auth::user()->id),
            'properties' => User::find(Auth::user()->id)->user_properties()->get()
        ]);
    }

    public function get_properties($user_id)
    {
        // return User::find(Auth::user()->id)->user_properties()->paginate(4);
        return UserProperty::join('users', 'user_id', 'users.id')
        ->join('properties', 'property_uuid', 'properties.uuid')
        ->select('*')
        ->where('user_id', Auth::user()->id)
         ->when($this->property, function($query){
         
         $query->where('property','like', '%'.$this->property.'%');
         }) 
          
        ->orderBy('properties.created_at', 'desc')
        ->paginate(4);
    }
}
