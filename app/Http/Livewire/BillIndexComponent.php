<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Collection;
use Carbon\Carbon;
use DB;
use Illuminate\Validation\Rule;

use Livewire\WithPagination;
use App\Models\Contract;
use App\Models\Tenant;
use App\Models\Particular;
use App\Models\PropertyParticular;
use Illuminate\Support\Str;

class BillIndexComponent extends Component
{
   use WithPagination;

   public $property;

   public $search;

   public $active_contracts;

   public $active_tenants;

   public $selectedBills = [];

   public $selectAllBills = false;

   public $status = 'unpaid';

   public $view = 'listView';  

   public $isPaymentAllowed = false;

   public $particular;

   public $posted_dates;

   public $batch_no;

   public $start;

   public $end;

   public $particular_id;

   public $bill;

   public $bill_type;

   public $new_particular;

   public $filter_bill_to;


   public function mount($batch_no)
   {
      $this->batch_no = $batch_no;
      $this->bill = 0;
   }

   public function redirectToUnitsPage(){
      

      return redirect('/property/'.$this->property->uuid.'/unit/');
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

   public function clearFilters()
   {
      $this->search = '';
      $this->particular = ''; 
      $this->posted_dates = '';
      $this->status = '';
      $this->bill_type = '';
   }

   public function get_bills_per_period($start){
      return Bill::orderBy('bill_no', 'desc')
               ->where('property_uuid', $this->property->uuid)
               ->where('is_posted', 1)
               ->when($this->status, function($query){
               $query->whereIn('status', [$this->status]);
               })
               ->when($this->bill_type, function($query){
               $query->whereNotNull($this->bill_type);
               })
               ->when($this->batch_no, function($query){
               $query->where('batch_no', $this->batch_no);
               })
               ->when($this->particular, function($query){
               $query->where('particular_id', $this->particular);
               })
               ->when($start, function($query, $start){
               $query->whereBetween('created_at', [$start, now()]);
               })
               ->get();
   }

   public function get_delinquents(){
      return Bill::selectRaw('sum(bill-initial_payment) as balance, tenant_uuid, owner_uuid, guest_uuid, particular_id, bill,
      initial_payment, created_at, unit_uuid')
      ->where('property_uuid', $this->property->uuid)
      ->where('bill', '>','initial_payment')
      ->whereNotNull('tenant_uuid')
      ->where('start', '>', Carbon::now()->subMonth()->toDateTimeString())
      ->groupBy('tenant_uuid')
      ->orderBy('balance', 'desc')
      ->get();
   }

   public function get_bills()
   {  
      $bills = '';

      if($this->filter_bill_to === 'delinquent')
      {
         $bills = $this->get_delinquents();
      }else{
         if($this->posted_dates == 'monthly'){
            $bills = $this->get_bills_per_period(now()->subdays(30));
         }elseif($this->posted_dates == 'quarterly'){
            $bills = $this->get_bills_per_period(now()->subdays(90));
         }else{
            $bills = $this->get_bills_per_period('');
         }
      }
       return $bills;
   }

   public function changeView($view)
    {
        $this->view = $view;
    }

    public function viewDelinquents(){
      if($this->filter_bill_to === 'delinquent'){
         $this->filter_bill_to = '';
      }else{
         $this->filter_bill_to = 'delinquent';
      }
    }


   public function storeParticular(){
      
      $particular_id = Particular::
      where('particular', strtolower($this->new_particular))
      ->pluck('id')
      ->first();

      Particular::updateOrCreate(
         [
            'particular' => $this->new_particular
         ],
         [
            'particular' => $this->new_particular
         ]
         );

         if($particular_id){
         PropertyParticular::updateOrCreate(
                [
                'property_uuid' => $this->property->uuid,
                'particular_id' => $particular_id
                ],
                [
                'property_uuid' => $this->property->uuid,
                'particular_id' => $particular_id
                ]
                );
         }

         session()->flash('success', 'Success!');
   }

   protected function rules()
   {
      return [
          'particular_id' => ['required', Rule::exists('particulars', 'id')],
          'start' => 'required|date',
          'end' => 'required|date|after:start',
          'bill' => 'nullable|numeric'
      ];
   }

   public function storeBills(){


      $attributes = $this->validate();

      $tenant_uuid = Contract::where('property_uuid', $this->property->uuid)
      ->where('contracts.status','active')
      ->pluck('tenant_uuid');

      $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no($this->property->uuid);

      $batch_no = app('App\Http\Controllers\BillController')->generate_bill_batch_no($bill_no);

      $bill_count = Contract::where('property_uuid', $this->property->uuid)->where('status', 'active')->count();

      try{
         for($i=0; $i<$bill_count; $i++){ 
            $unit_uuid=Contract::where('property_uuid', $this->property->uuid)
                ->where('contracts.status','active')
                ->where('tenant_uuid', $tenant_uuid[$i])
                ->pluck('unit_uuid');

            $reference_no = Tenant::find($tenant_uuid[$i]);

            $rent = Contract::where('property_uuid', $this->property->uuid)
                ->where('contracts.status','active')
                ->where('tenant_uuid', $tenant_uuid[$i])
                ->pluck('rent');

            $attributes['unit_uuid']= $unit_uuid[0];
            $attributes['tenant_uuid'] = $tenant_uuid[$i];

               if($this->particular_id == 1)
               {
                  $attributes['bill'] = $rent[0];
               }
                
               if($this->particular_id == 8){
                  $attributes['bill'] = -($this->bill);
               }
               
                $attributes['bill_no'] = $bill_no++;
                $attributes['reference_no'] = $reference_no->bill_reference_no;
                $attributes['user_id'] = auth()->user()->id;
                $attributes['due_date'] = Carbon::parse($this->start)->addDays(7);
                $attributes['property_uuid'] = $this->property->uuid;
                $attributes['batch_no'] = $batch_no;

                Bill::create($attributes);
                }

                return redirect('/property/'.$this->property->uuid.'/bill/customized/'.$batch_no.'/edit')->with('success', 'Success!');

            }catch(\Exception $e)
            {
                session()->flash('error', $e);
            }
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

      $particulars = app('App\Http\Controllers\PropertyParticularController')->index($this->property->uuid);

      $dates_posted = $this->get_posted_dates(); 

      $period_covered_starts = $this->get_period_covered_starts();

      $period_covered_ends = $this->get_period_covered_ends();
         
      return view('livewire.bill-index-component', [
         'bills' => $this->get_bills(),
         'statuses' =>  $this->get_statuses(),
         'particulars' => $particulars,
         'dates_posted' => $dates_posted,
         'period_covered_starts' => $period_covered_starts,
         'period_covered_ends' => $period_covered_ends
        ]);
   }

   public function get_statuses()
   {
      return Bill::where('bills.property_uuid', $this->property->uuid)
      ->groupBy('status')
      ->get();
   }

   public function get_posted_dates()
   {
      return Bill::where('property_uuid', $this->property->uuid)
      ->select('*',DB::raw("(DATE_FORMAT(created_at,'%M %d, %Y')) as date_posted"), DB::raw('count(*) as count'))
      ->groupBy('date_posted')
      ->orderBy('created_at')
      ->get();
   }

   public function get_period_covered_starts()
   {
      return Bill::where('property_uuid', $this->property->uuid)
      ->select('*',DB::raw("(DATE_FORMAT(start,'%M %d, %Y')) as period_covered_start"), DB::raw('count(*) as count'))
      ->groupBy('period_covered_start')
      ->orderBy('start')
      ->get();
   }

   public function get_period_covered_ends()
   {
      return Bill::where('property_uuid', $this->property->uuid)
      ->select('*',DB::raw("(DATE_FORMAT(end,'%M %d, %Y')) as period_covered_end"), DB::raw('count(*) as count'))
      ->groupBy('period_covered_end')
      ->orderBy('end')
      ->get();
   }

   public function exportBills(){
      
      
      return redirect('/property/'.$this->property->uuid.'/bill/export/status/'.$this->status.'/particular/'.$this->particular.'/date/'.$this->posted_dates);
   }

}
