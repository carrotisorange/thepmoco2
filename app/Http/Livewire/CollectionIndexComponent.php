<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use Livewire\Component;
use Session;
use DB;

class CollectionIndexComponent extends Component
{
    public $search = null;
    public $start = [];
    public $end = [];

    public $mode_of_payment;

    public function resetFilters()
    {
        $this->start = [];
        $this->end = [];
    }

    public function render()
    {
        $collections = $this->get_ars();

        $mode_of_payments = AcknowledgementReceipt::where('property_uuid', Session::get('property'))
        ->select('mode_of_payment', DB::raw('count(*) as count'))
        ->groupBy('mode_of_payment')
        ->get();


        return view('livewire.collection-index-component',[
            'collections' => $collections,
            'mode_of_payments' => $mode_of_payments

        ]);
    }

    public function get_ars()
    {
        return AcknowledgementReceipt::search($this->search)
        ->orderBy('ar_no', 'desc')
        ->where('property_uuid', Session::get('property'))
        ->when($this->start, function($query){
            $query->whereDate('created_at', $this->start);
        })
         ->when($this->mode_of_payment, function($query){
         $query->where('mode_of_payment', $this->mode_of_payment);
         })
        ->when($this->end, function($query){
            $query->orWhereDate('created_at', $this->end);
        })->paginate(10);
    }
}
