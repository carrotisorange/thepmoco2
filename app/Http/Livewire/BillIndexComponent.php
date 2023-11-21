<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Session;

use Livewire\WithPagination;
use App\Models\{Particular,PropertyParticular,Bill,Collection,Property};

class BillIndexComponent extends Component
{
   use WithPagination;

   public $search;
   public $selectedBills = [];
   public $selectAllBills = false;
   public $status = 'unpaid';
   public $view = 'listView';
   public $isPaymentAllowed = false;
   public $particular_id;
   public $posted_dates;
   public $batch_no;
   public $bill_type;
   public $isIndividualView = false;

   public function redirectToUnitsPage(){
      return redirect('/property/'.Session::get('property_uuid').'/unit/');
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

   public function get_bills_per_period($start){
      return Bill::orderBy('bill_no', 'desc')
               ->where('property_uuid', Session::get('property_uuid'))
               ->posted()
               ->when($this->status, function($query){
               $query->whereIn('status', [$this->status]);
               })
               ->when($this->bill_type, function($query){
               $query->whereNotNull($this->bill_type);
               })
               ->when($this->batch_no, function($query){
               $query->where('batch_no', $this->batch_no);
               })
               ->when($this->particular_id, function($query){
               $query->where('particular_id', $this->particular_id);
               })
            ->paginate(10);
   }

   public function get_bills()
   {
      $bills = '';
         if($this->posted_dates === 'monthly'){
            $bills = $this->get_bills_per_period(now()->subdays(30));
         }elseif($this->posted_dates === 'quarterly'){
            $bills = $this->get_bills_per_period(now()->subdays(90));
         }else{
            $bills = $this->get_bills_per_period('');
         }
       return $bills;
   }

   public function changeView($view)
    {
        $this->view = $view;
    }

   public function get_posted_dates()
   {
      return Bill::where('property_uuid', Session::get('property_uuid'))
      ->select('*',DB::raw("(DATE_FORMAT(created_at,'%M %d, %Y')) as date_posted"), DB::raw('count(*) as count'))
      ->groupBy('date_posted')
      ->orderBy('created_at')
      ->get();
   }

   public function get_period_covered_starts()
   {
      return Bill::where('property_uuid', Session::get('property_uuid'))
      ->select('*',DB::raw("(DATE_FORMAT(start,'%M %d, %Y')) as period_covered_start"), DB::raw('count(*) as count'))
      ->groupBy('period_covered_start')
      ->orderBy('start')
      ->get();
   }

   public function get_period_covered_ends()
   {
      return Bill::where('property_uuid', Session::get('property_uuid'))
      ->select('*',DB::raw("(DATE_FORMAT(end,'%M %d, %Y')) as period_covered_end"), DB::raw('count(*) as count'))
      ->groupBy('period_covered_end')
      ->orderBy('end')
      ->get();
   }

    public function render()
   {
        $bills = $this->get_bills();
        $collections = app('App\Http\Controllers\Features\CollectionController')->get(1);
        $particulars = app('App\Http\Controllers\Utilities\PropertyParticularController')->index(Session::get('property_uuid'));
        $dates_posted = $this->get_posted_dates();
        $period_covered_starts = $this->get_period_covered_starts();
        $period_covered_ends = $this->get_period_covered_ends();
        $propertyBillsCount = app('App\Http\Controllers\Features\BillController')->get(1)->count();
        $statuses = app('App\Http\Controllers\Features\BillController')->get(1,null,'status');
      return view('livewire.features.bill.bill-index-component', compact(
         'bills',
         'collections',
         'statuses',
         'particulars',
         'dates_posted' ,
         'period_covered_starts',
         'period_covered_ends',
         'propertyBillsCount'
      ));
   }

}
