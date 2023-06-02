<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use Livewire\Component;
use Session;
use DB;
use Carbon\Carbon;
use App\Models\Collection;

class CollectionIndexComponent extends Component
{
    public $property;
    public $search = null;
    public $start = [];
    public $end = [];

    public $date;

    public $form;

    public $bill_type;

    public function mount(){
        $this->date = Carbon::now()->format('Y-m-d');
    }

    public function resetFilters()
    {
        $this->start = [];
        $this->end = [];
    }

    public function render()
    {
        $collections = $this->get_ars();

        $mode_of_payments = Collection::where('property_uuid', $this->property->uuid)
        ->groupBy('form')
        ->get();

        // $mode_of_payments = AcknowledgementReceipt::where('property_uuid', $this->property->uuid)
        // ->select('mode_of_payment', DB::raw('count(*) as count'))
        // ->groupBy('mode_of_payment')
        // ->get();


        return view('livewire.collection-index-component',[
            'collections' => $collections,
            'mode_of_payments' => $mode_of_payments

        ]);
    }

    public function exportDCR(){
        

        return redirect('/property/'.$this->property->uuid .'/dcr/'.$this->date);
    }

    public function get_ars()
    {
        return Collection::search($this->search)
        ->select('*', DB::raw("SUM(collection) as collection"),DB::raw("count(collection) as count") )
        ->where('property_uuid', $this->property->uuid)
        ->when($this->start, function($query){
            $query->whereDate('updated_at', $this->start);
        })
         ->when($this->form, function($query){
         $query->where('form', $this->form);
         })
        ->when($this->bill_type, function($query){
           $query->whereNotNull($this->bill_type);
        })
        ->when($this->end, function($query){
            $query->orWhereDate('updated_at', $this->end);
        })
        ->where('is_posted', 1)
        ->groupBy('ar_no')
        ->orderBy('ar_no', 'desc')
        ->get();

        // return AcknowledgementReceipt::search($this->search)
        // ->orderBy('ar_no', 'desc')
        // ->where('property_uuid', $this->property->uuid)
        // ->when($this->start, function($query){
        //     $query->whereDate('created_at', $this->start);
        // })
        //  ->when($this->mode_of_payment, function($query){
        //  $query->where('mode_of_payment', $this->mode_of_payment);
        //  })
        // ->when($this->bill_type, function($query){
        //    $query->whereNotNull($this->bill_type);
        // })
        // ->when($this->end, function($query){
        //     $query->orWhereDate('created_at', $this->end);
        // })->get();
    }
}
