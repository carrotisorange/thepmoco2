<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Concern;

class AncillaryIndexComponent extends Component
{
    public $status;
    public $search;

    public function render()
    {
         $concerns = Concern::search($this->search)
         ->orderBy('created_at', 'desc')
         ->where('property_uuid', Session::get('property_uuid'))
         ->where('category_id', 4)
         ->when($this->status, function($query){
         $query->whereIn('status',[ $this->status]);
         })
         ->when($this->search, function($query){
         $query->where('reference_no','like', '%'.$this->search.'%');
         })
         ->paginate(10);

        return view('livewire.ancillary-index-component',compact('concerns'));
    }
}
