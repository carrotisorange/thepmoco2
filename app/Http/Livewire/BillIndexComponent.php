<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Collection;
use Session;
use DB;

use Livewire\WithPagination;

class BillIndexComponent extends Component
{
   use WithPagination;

   public $search = null;

   public $active_contracts;

   public $active_tenants;

   public $selectedBills = [];

   public $selectAllBills = false;

   public $status;

   public $view = 'listView';  

   public $particular_id;

   public $posted_dates;

   public $batch_no;


   public function mount($batch_no)
   {
      $this->batch_no = $batch_no;
   }

   public function updatedSelectAllBills($value)
   {
      if($value)
      {
         $this->selectedBills = $this->get_bills()->pluck('id');
      }
      else
      {
         $this->selectedBills = [];
      }
   }

   public function removeBills()
     {
       
        if(!Bill::whereIn('id', $this->selectedBills)->where('status', 'unpaid')->delete())
        {
            $this->selectedBills = [];

            return back()->with('error', 'Bill cannnot be deleted.');
        }

        //Bill::destroy($this->selectedBills);

        $this->selectedBills = [];

        return back()->with('success','Bill is successfully removed.');
     }

   public function resetFilters()
   {
      $this->status = [];
      $this->start = '';
      $this->end = '';
      $this->particular_id = [];
      $this->created_at = '';
   }

   public function clearFilters()
   {
      $this->search = '';
      $this->particular_id = ''; 
      $this->posted_dates = '';
      $this->status = '';
   }

   public function deleteBills()
   {
      Bill::destroy($this->selectedBills);

      $this->selectedBills = [];

      $this->bills = $this->get_bills();
   }

   public function get_bills()
   {
      if($this->posted_dates == 'monthly'){
          return Bill::search($this->search, $this->posted_dates)
          ->orderBy('bill_no', 'desc')
          ->where('property_uuid', Session::get('property'))
          ->where('is_posted', 1)
          ->when($this->status, function($query){
          $query->whereIn('status', [$this->status]);
          })
         ->when($this->batch_no, function($query){
          $query->where('batch_no', $this->batch_no);
          })
          ->when($this->particular_id, function($query){
          $query->where('particular_id', $this->particular_id);
          })
          ->whereBetween('created_at', [now()->subdays(30), now()])
          ->get();
      }elseif($this->posted_dates == 'quarterly'){
          return Bill::search($this->search, $this->posted_dates)
          ->orderBy('bill_no', 'desc')
          ->where('property_uuid', Session::get('property'))
          ->where('is_posted', 1)
          ->when($this->status, function($query){
          $query->whereIn('status', [$this->status]);
          })
           ->when($this->batch_no, function($query){
           $query->where('batch_no', $this->batch_no);
           })
          ->when($this->particular_id, function($query){
          $query->where('particular_id', $this->particular_id);
          })
          ->whereBetween('created_at', [now()->subdays(90), now()])
          ->get();
      }else{
         return Bill::search($this->search, $this->posted_dates)
         ->orderBy('bill_no', 'desc')
         ->where('property_uuid', Session::get('property'))
         ->where('is_posted', 1)
         ->when($this->status, function($query){
         $query->whereIn('status', [$this->status]);
         })
          ->when($this->batch_no, function($query){
          $query->where('batch_no', $this->batch_no);
          })
         ->when($this->particular_id, function($query){
         $query->where('particular_id', $this->particular_id);
         })
         ->paginate(10);
      }
     
   }

   public function changeView($view)
    {
        $this->view = $view;
    }

   public function unpayBills()
   {
      $this->update_bill();

      $collection_batch_no = Collection::where('bill_id', $this->selectedBills[0])->pluck('batch_no');

      app('App\Http\Controllers\AcknowledgementReceiptController')->destroy($collection_batch_no);

      $this->delete_collection();

      $this->selectedBills = [];

      return redirect('/property/'.Session::get('property').'/bills')->with('success','Bill is successfully marked as unpaid.');
        
   }

   public function delete_collection()
   {
      Collection::destroy('bill_id', $this->selectedBills);
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
      $particulars = app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property'));

      $dates_posted = $this->get_posted_dates(); 

      $period_covered_starts = $this->get_period_covered_starts();

      $period_covered_ends = $this->get_period_covered_ends();

      $bills = $this->get_bills();
         
      return view('livewire.bill-index-component', [
         'bills' => $bills,
         'statuses' =>  $this->get_statuses(),
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
