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
    public $property;
    
    public function render()
    {
        $concerns = Concern::search($this->property->uuid)
        ->orderBy('created_at', 'desc')
        ->where('property_uuid', $this->property->uuid)
        ->when($this->status, function($query){
        $query->whereIn('status',[ $this->status]);
        })
        ->when($this->search, function($query){
        $query->where('reference_no','like', '%'.$this->search.'%');

        })
        ->paginate(10);

        $statuses= Concern::where('property_uuid', $this->property->uuid)
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        return view('livewire.concern-index-component',[
            'concerns' => $concerns,
            'statuses' => $statuses
        ]);
    }
}
