<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use DB;
use Livewire\WithPagination;
use App\Models\{Concern,Property};

class ConcernIndexComponent extends Component
{
    use WithPagination;

    public $search;
    public $status;

    public function render()
    {
        $propertyConcernsCount = Property::find(Session::get('property_uuid'))->concerns->count();

        $concerns = Concern::search(Session::get('property_uuid'))
        ->orderBy('created_at', 'desc')
        ->where('property_uuid', Session::get('property_uuid'))
        ->when($this->status, function($query){
        $query->whereIn('status',[ $this->status]);
        })
        ->when($this->search, function($query){
        $query->where('reference_no','like', '%'.$this->search.'%');

        })
        ->paginate(10);

        $statuses= Concern::where('property_uuid', Session::get('property_uuid'))
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        return view('livewire.concern-index-component',[
            'concerns' => $concerns,
            'statuses' => $statuses,
            'propertyConcernsCount' => $propertyConcernsCount
        ]);
    }
}
