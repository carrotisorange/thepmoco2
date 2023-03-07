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

class BillIndexComponent extends Component
{
   use WithPagination;

   public $property;

   public $search = null;

   public $active_contracts;

   public $active_tenants;

   public $selectedBills = [];

   public $selectAllBills = false;

   public $status;

   public $view = 'listView';  

   public $isPaymentAllowed = true;

   public $particular;

   public $posted_dates;

   public $batch_no;

   public $start;
   public $end;
   public $particular_id;
   public $bill;

   public $new_particular;


   public function mount($batch_no)
   {
      $this->batch_no = $batch_no;
       $this->start = Carbon::now()->format('Y-m-d');
       $this->end = Carbon::now()->addMonth()->format('Y-m-d');
       $this->bill = 0;
   }

   public function redirectToUnitsPage(){
      sleep(2);

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

   public function removeBills()
     {

      sleep(2);
       
        if(!Bill::whereIn('id', $this->selectedBills)->where('status', 'unpaid')->delete())
        {
            $this->selectedBills = [];

            return back()->with('error', 'Bill cannnot be deleted.');
        }

        Bill::destroy($this->selectedBills);

        $this->selectedBills = [];

        return back()->with('success', 'Success!');
     }

   public function clearFilters()
   {
      $this->search = '';
      $this->particular = ''; 
      $this->posted_dates = '';
      $this->status = '';
   }

   public function get_bills()
   {
      if($this->posted_dates == 'monthly'){
          return Bill::search($this->search, $this->posted_dates)
          ->orderBy('bill_no', 'desc')
          ->where('property_uuid', $this->property->uuid)
          ->where('is_posted', 1)
          ->when($this->status, function($query){
          $query->whereIn('status', [$this->status]);
          })
         ->when($this->batch_no, function($query){
          $query->where('batch_no', $this->batch_no);
          })
          ->when($this->particular, function($query){
          $query->where('particular_id', $this->particular);
          })
          ->whereBetween('created_at', [now()->subdays(30), now()])
          ->paginate(10);
      }elseif($this->posted_dates == 'quarterly'){
          return Bill::search($this->search, $this->posted_dates)
          ->orderBy('bill_no', 'desc')
          ->where('property_uuid', $this->property->uuid)
          ->where('is_posted', 1)
          ->when($this->status, function($query){
          $query->whereIn('status', [$this->status]);
          })
           ->when($this->batch_no, function($query){
           $query->where('batch_no', $this->batch_no);
           })
          ->when($this->particular, function($query){
          $query->where('particular_id', $this->particular);
          })
          ->whereBetween('created_at', [now()->subdays(90), now()])
           ->paginate(10);
      }else{
         return Bill::search($this->search, $this->posted_dates)
         ->orderBy('bill_no', 'desc')
         ->where('property_uuid', $this->property->uuid)
         ->where('is_posted', 1)
         ->when($this->status, function($query){
         $query->whereIn('status', [$this->status]);
         })
          ->when($this->batch_no, function($query){
          $query->where('batch_no', $this->batch_no);
          })
         ->when($this->particular, function($query){
         $query->where('particular_id', $this->particular);
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

      return redirect('/property/'.$this->property->uuid.'/bills')->with('success','Success!');
        
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

      sleep(2);

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
                }elseif($this->particular_id == 8){
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
      return Bill::where('bills.property_uuid', $this->property->uuid)
      ->select('status', DB::raw('count(*) as count'))
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
      sleep(2);
      
      return redirect('/property/'.$this->property->uuid.'/bill/export/status/'.$this->status.'/particular/'.$this->particular.'/date/'.$this->posted_dates);
   }

}
