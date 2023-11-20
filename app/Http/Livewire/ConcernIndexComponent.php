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
        $propertyConcernsCount = app('App\Http\Controllers\Features\ConcernController')->get()->count();

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

        $statuses = app('App\Http\Controllers\Features\ConcernController')->get('','status');

        return view('livewire.features.concern.concern-index-component', compact(
            'concerns',
            'statuses',
            'propertyConcernsCount'
        ));
    }
}
