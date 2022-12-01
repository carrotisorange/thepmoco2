<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Session;
use App\Models\Concern;
use DB;
use Livewire\WithPagination;

class ConcernIndexComponent extends Component
{
    use WithPagination;

    public $search;
    public $status;
    
    public function render()
    {
        $statuses= Concern::where('property_uuid', Session::get('property'))
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        return view('livewire.concern-index-component',[
            'concerns' => 
            Concern::search(Session::get('property'))
            ->orderBy('created_at', 'desc')
            ->where('property_uuid', Session::get('property'))
            ->when($this->status, function($query){
            $query->whereIn('status',[ $this->status]);
            })
             ->when($this->search, function($query){
            $query->where('reference_no','like', '%'.$this->search.'%');
            
            })
            ->paginate(10),
            'statuses' => $statuses
        ]);
    }
}
