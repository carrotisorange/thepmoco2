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

use Livewire\WithPagination;

class BillIndexComponent extends Component
{
   use WithPagination;

   public $search = null;

   public $selectedBills = [];
   public $selectAll = false;

   public $status = ['unpaid', 'partially_paid'];
   public $start;
   public $end;
   public $particular_id = [];
   public $created_at;

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
            $query->whereBetween('start', [$this->start, $this->end]);
         })
         ->when($this->end, function($query){
            $query->whereBetween('end', [$this->start, $this->end]);
         })
         ->when($this->particular_id, function($query){
            $query->where('particular_id', $this->particular_id);
         })
         ->when($this->created_at, function($query){
            $query->whereDate('created_at', $this->created_at);
         })->pluck('id');
         }
         else
         {
            $this->selectedBills = [];
         }
       }

   public function resetFilters()
   {
      $this->status = [];
      $this->start = '';
      $this->end = '';
      $this->particular_id = [];
      $this->created_at = '';
   }

   public function deleteBills()
   {
      Bill::destroy($this->selectedBills);

      $this->selectedBills = [];

      $this->bills = $this->get_bills();
   }

   public function get_bills()
   {
      return Bill::search($this->search)
      ->orderBy('bill_no', 'asc')
      ->where('property_uuid', Session::get('property'))
      ->when($this->status, function($query){
      $query->whereIn('status', $this->status);
      })
         ->when($this->start, function($query){
      $query->whereBetween('start', [$this->start, $this->end]);
      })
         ->when($this->end, function($query){
      $query->whereBetween('end', [$this->start, $this->end]);
      })
         ->when($this->particular_id, function($query){
      $query->whereIn('particular_id', $this->particular_id);
      })
         ->when($this->created_at, function($query){
      $query->whereDate('created_at', $this->created_at);
      })->paginate(10);
   }

   public function unpayBills()
   {
      $this->update_bill();

      $collection_batch_no = Collection::where('bill_id', $this->selectedBills[0])->pluck('batch_no');

      app('App\Http\Controllers\AcknowledgementReceiptController')->store($collection_batch_no);

      $this->delete_collection();

      $this->selectedBills = [];

      return redirect('/property/'.Session::get('property').'/bills')->with('success','Bills successfully marked as unpaid.');
        
   }

   public function delete_collection()
   {
      Collection::whereIn('bill_id', $this->selectedBills)->delete();
   }

   public function update_bill()
   {
      Bill::whereIn('id', $this->selectedBills)
      ->update([
      'status' => 'unpaid',
      'initial_payment' => 0
      ]);
   }

   public function render()
   {
      $statuses = $this->get_statuses();

      $particulars = app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property'));

      $dates_posted = $this->get_posted_dates(); 

      $period_covered_starts = $this->get_period_covered_starts();

      $period_covered_ends = $this->get_period_covered_ends();

      $bills = $this->get_bills();
         
      return view('livewire.bill-index-component', [
         'bills' => $bills,
         'statuses' => $statuses,
         'particulars' => $particulars,
         'dates_posted' => $dates_posted,
         'period_covered_starts' => $period_covered_starts,
         'period_covered_ends' => $period_covered_ends
        ]);
   }

   public function get_statuses()
   {
      return Bill::where('bills.property_uuid', Session::get('property'))
      ->select('status', DB::raw('count(*) as count'))
      ->groupBy('status')
      ->get();
   }

   public function get_posted_dates()
   {
      return Bill::where('property_uuid', Session::get('property'))
      ->select('*',DB::raw("(DATE_FORMAT(created_at,'%M %d, %Y')) as date_posted"), DB::raw('count(*) as count'))
      ->groupBy('date_posted')
      ->orderBy('created_at')
      ->get();
   }

   public function get_period_covered_starts()
   {
      return Bill::where('property_uuid', Session::get('property'))
      ->select('*',DB::raw("(DATE_FORMAT(start,'%M %d, %Y')) as period_covered_start"), DB::raw('count(*) as count'))
      ->groupBy('period_covered_start')
      ->orderBy('start')
      ->get();
   }

   public function get_period_covered_ends()
   {
      return Bill::where('property_uuid', Session::get('property'))
      ->select('*',DB::raw("(DATE_FORMAT(end,'%M %d, %Y')) as period_covered_end"), DB::raw('count(*) as count'))
      ->groupBy('period_covered_end')
      ->orderBy('end')
      ->get();
   }

}
