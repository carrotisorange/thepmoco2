<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use DB;
use Carbon\Carbon;
use App\Models\{Collection,Property};

class CollectionIndexComponent extends Component
{
    public $search = null;
    public $start = [];
    public $end = [];

    public $start_date;
    public $end_date;

    public $form;

    public $bill_type;

    public function mount(){
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->format('Y-m-d');
    }

    public function exportDCR(){
        return redirect('/property/'.Session::get('property_uuid') .'/dcr/'.$this->start_date.'/'.$this->end_date);
    }

    public function get_ars()
    {
        return Collection::search($this->search)
        ->select('*', DB::raw("SUM(collection) as collections"),DB::raw("count(collection) as count") )
        ->where('property_uuid', Session::get('property_uuid'))
        // ->when($this->start, function($query){
        ->whereBetween('created_at', [$this->start_date, $this->end_date])
        // })
         ->when($this->form, function($query){
         $query->where('form', $this->form);
         })
        ->when($this->bill_type, function($query){
           $query->whereNotNull($this->bill_type);
        })
        ->when($this->end, function($query){
            $query->orWhereDate('updated_at', $this->end);
        })
        ->posted()
        ->groupBy('ar_no')
        ->orderBy('ar_no', 'desc')
        ->get();
    }


    public function render()
    {
        $collections = $this->get_ars();

        ddd(Session::get('property_uuid'));

        $mode_of_payments = Collection::where('property_uuid', Session::get('property_uuid'))
        ->groupBy('form')
        ->get();

        $propertyCollectionsCount = Property::find(Session::get('property_uuid'))->collections->count();

        return view('livewire.features.collection.collection-index-component',[
            'collections' => $collections,
            'mode_of_payments' => $mode_of_payments,
            'propertyCollectionsCount' => $propertyCollectionsCount

        ]);
    }
}
