<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use Livewire\Component;
use Session;

class CollectionIndexComponent extends Component
{
    public $search = null;
    public $start = [];
    public $end = [];

    public function resetFilters()
    {
        $this->start = [];
        $this->end = [];
    }

    public function render()
    {
        $ars = $this->get_ars();

        return view('livewire.collection-index-component',[
            'ars' => $ars
        ]);
    }

    public function get_ars()
    {
        return AcknowledgementReceipt::search($this->search)
        ->orderBy('ar_no', 'asc')
        ->where('property_uuid', Session::get('property'))
        ->when($this->start, function($query){
            $query->whereDate('created_at', $this->start);
        })
        ->when($this->end, function($query){
            $query->orWhereDate('created_at', $this->end);
        })->get();
    }
}
