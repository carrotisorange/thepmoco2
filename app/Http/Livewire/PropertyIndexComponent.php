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
    public $search;
    public $sortBy;
    public $filterByPropertyType;
    public $limitDisplayTo = 4;

    public $totalPropertyCount;

    public function mount(){
        $this->totalPropertyCount = UserProperty::where('user_id', auth()->user()->id)->count();
    }

    public function render()
    {
        $property_types = UserProperty::join('users', 'user_id', 'users.id')
        ->join('properties', 'property_uuid', 'properties.uuid')
        ->join('types', 'properties.type_id', 'types.id')
        ->select('*', DB::raw('count(*) as count'))
        ->where('user_id', auth()->user()->id)
        ->where('properties.status', 'active')
        ->groupBy('type_id')
        ->get();

        // $properties = User::find(auth()->user()->id)->user_properties()->get();
        
        return view('livewire.property-index-component',[
            'portfolio'=> $this->get_properties(auth()->user()->id),
            'properties' => $this->get_properties(auth()->user()->id),
            'property_types' => $property_types
        ]);
    }

    public function clearFilters(){
        $this->search = null;
        $this->sortBy = null;
        $this->filterByPropertyType = null;
        $this->limitDisplayTo = null;
    }

    public function exportPortfolio(){
        return redirect('/user/'.auth()->user()->id.'/export/portfolio');
    }

    public function createNewProperty(){
        return redirect('/property/'.Str::random(8).'/create');
    }

    public function submitForm(){
        return redirect('/property/'.Str::random(8).'/create');
    }

    public function get_properties($user_id)
    {
        // return User::find(Auth::user()->id)->user_properties()->paginate(4);
        return UserProperty::join('users', 'user_id', 'users.id')
        ->join('properties', 'property_uuid', 'properties.uuid')
        ->join('types', 'type_id', 'types.id')
        ->select('*')
        ->where('user_id', auth()->user()->id)
        ->where('properties.status', 'active')
        ->when($this->search, function($query){
        $query->where('property','like', '%'.$this->search.'%');
        }) 
        ->when($this->sortBy, function($query){
        $query->orderBy('properties.'.$this->sortBy, 'desc');
        })
         ->when($this->filterByPropertyType, function($query){
         $query->where('type_id',$this->filterByPropertyType);
         })->paginate($this->limitDisplayTo);
    }

  
}
