<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Particular;
use Session;
use DB;

class BillIndexComponent extends Component
{
      public $search = null;

      public $selectedBills = [];
      public $selectAll = false;

      public $status = [];
      public $start = [];
      public $end = [];
      public $particular_id = [];
      public $created_at = [];

       public function updatedSelectAll($value)
       {
         if($value)
         {
            $this->selectedBills = Bill::where('property_uuid', Session::get('property'))
                 ->when($this->status, function($query){
                 $query->where('status', $this->status);
                 })
                 ->when($this->start, function($query){
                 $query->whereDate('start', $this->start);
                 })
                 ->when($this->end, function($query){
                 $query->whereDate('start', $this->end);
                 })
                 ->when($this->particular_id, function($query){
                 $query->where('particular_id', $this->particular_id);
                 })
                 ->when($this->created_at, function($query){
                 $query->whereDate('created_at', $this->created_at);
                 })
            
            ->pluck('id');
         }else
         {
            $this->selectedBills = [];
         }
       }

      public function resetFilters()
      {
        $this->status = [];
        $this->start = [];
        $this->end = [];
        $this->particular_id = [];
        $this->created_at = [];
      }

      public function deleteBills()
      {
         Bill::destroy($this->selectedBills);

         $this->selectedBills = [];

      session()->flash('success', 'Units Successfully Deleted!');
      }

    public function render()
    {
        $statuses = Bill::where('bills.property_uuid', Session::get('property'))
         ->select('status', DB::raw('count(*) as count'))
         ->groupBy('status')
         ->get();

        $particulars = Particular::join('bills', 'particulars.id', 'bills.particular_id')
        ->select('particular','particulars.id as particular_id', DB::raw('count(*) as count'))
        ->where('bills.property_uuid', Session::get('property'))
        ->groupBy('particulars.id')
        ->get();

        return view('livewire.bill-index-component', [
            'bills' => Bill::search($this->search)
            ->orderBy('bill_no', 'asc')
            ->where('property_uuid', Session::get('property'))
            ->when($this->status, function($query){
               $query->where('status', $this->status);
            })
            ->when($this->start, function($query){
               $query->whereDate('start', $this->start);
            })
            ->when($this->end, function($query){
               $query->whereDate('start', $this->end);
            })
            ->when($this->particular_id, function($query){
               $query->where('particular_id', $this->particular_id);
            })
            ->when($this->created_at, function($query){
                $query->whereDate('created_at', $this->created_at);
            })
            ->get(),
            'statuses' => $statuses,
            'particulars' => $particulars
        ]);
    }
}
