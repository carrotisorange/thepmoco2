<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Particular;
use App\Models\Collection;
use App\Models\AcknowledgementReceipt; 
use Session;
use DB;
use Carbon\Carbon;

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

      public function mount()
      {
         //$this->created_at = Carbon::now()->startOfMonth()->format('Y-m-d');
         //$this->end = Carbon::now()->lastOfMonth()->format('Y-m-d');
      }

       public function updatedSelectAll($value)
       {
         if($value)
         {
            $this->selectedBills = Bill::search($this->search)

            ->where('property_uuid', Session::get('property'))
                
                 ->when($this->status, function($query){
                 $query->where('status', $this->status);
                 })
                 ->when($this->start, function($query){
                 $query->whereDate('start', $this->start);
                 })
                 ->when($this->end, function($query){
                 $query->whereDate('end', $this->end);
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

         $this->bills = Bill::search($this->search)
         ->orderBy('bill_no', 'asc')
         ->where('property_uuid', Session::get('property'))
         ->when($this->status, function($query){
         $query->where('status', $this->status);
         })
         ->when($this->start, function($query){
         $query->whereDate('start', $this->start);
         })
         ->when($this->end, function($query){
         $query->whereDate('end', $this->end);
         })
         ->when($this->particular_id, function($query){
         $query->where('particular_id', $this->particular_id);
         })
         ->when($this->created_at, function($query){
         $query->whereDate('created_at', $this->created_at);
         })
         ->get();

         //return redirect('/property/'.Session::get('property').'/bills')->with('success','Bills successfully removed.');
      }

      public function unpayBills()
     {
         Bill::whereIn('id', $this->selectedBills)
         ->update([
            'status' => 'unpaid'
         ]);

          $collection_batch_no = Collection::where('bill_id', $this->selectedBills[0])->pluck('batch_no');

          AcknowledgementReceipt::where('collection_batch_no', $collection_batch_no)->delete();

         Collection::whereIn('bill_id', $this->selectedBills)
           ->delete();

          $this->selectedBills = [];

      return redirect('/property/'.Session::get('property').'/bills')->with('success','Bills successfully marked as unpaid.');
        
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

              $total_count = Bill::whereIn('id', $this->selectedBills)
              ->where('status', 'paid')
              ->count();

            $bills =  Bill::search($this->search)
            ->orderBy('bill_no', 'asc')
            ->where('property_uuid', Session::get('property'))
            ->when($this->status, function($query){
               $query->where('status', $this->status);
            })
            ->when($this->start, function($query){
               $query->whereDate('start', $this->start);
            })
            ->when($this->end, function($query){
               $query->whereDate('end', $this->end);
            })
            ->when($this->particular_id, function($query){
               $query->where('particular_id', $this->particular_id);
            })
            ->when($this->created_at, function($query){
                $query->whereDate('created_at', $this->created_at);
            })
            ->get();
         

        return view('livewire.bill-index-component', [
            'bills' => $bills,
            'statuses' => $statuses,
            'particulars' => $particulars,
            'total_count' => $total_count,
             'total_paid_bills' => $bills->where('status', 'paid')->sum('bill'),
             'total_unpaid_bills' => $bills->where('status', 'unpaid')->sum('bill'),
        ]);
    }
}
