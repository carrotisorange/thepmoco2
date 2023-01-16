<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\UserProperty;
use Auth;

use Livewire\Component;
use App\Models\Property;
use Session;
use Illuminate\Support\Str;
use DB;

class PropertyIndexComponent extends Component
{
    public $property;
    public $sortBy;
    public $filterByPropertyType;
    
    public function render()
    {
        $property_types = UserProperty::join('users', 'user_id', 'users.id')
        ->join('properties', 'property_uuid', 'properties.uuid')
        ->join('types', 'properties.type_id', 'types.id')
        ->select('*', DB::raw('count(*) as count'))
        ->where('user_id', Auth::user()->id)
        ->groupBy('type_id')
        ->get();

        return view('livewire.property-index-component',[
            'portforlio'=> $this->get_properties(Auth::user()->id),
            'properties' => User::find(Auth::user()->id)->user_properties()->get(),
            'property_types' => $property_types
        ]);
    }

    public function submitForm(){
        
        sleep(2);

        return redirect('/property/'.Str::random(8).'/create');
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
        ->when($this->sortBy, function($query){
        $query->orderBy('properties.'.$this->sortBy, 'desc');
        })
         ->when($this->filterByPropertyType, function($query){
         $query->where('type_id',$this->filterByPropertyType);
         })->paginate(4);
    }

  
}
