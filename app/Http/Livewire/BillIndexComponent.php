<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use DB;
use Session;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use App\Models\{Contract,Tenant,Particular,PropertyParticular,Bill,Collection,Unit,Property};

class BillIndexComponent extends Component
{
   use WithPagination;

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

   public $isIndividualView = false;


   public function mount($batch_no)
   {
      $this->batch_no = $batch_no;
      $this->bill = 0;
      $this->start = Carbon::now()->format('Y-m-d');
   }

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
               ->when($this->particular, function($query){
               $query->where('particular_id', $this->particular);
               })
               ->when($start, function($query, $start){
               $query->whereBetween('created_at', [$start, now()]);
               })
                ->when($this->particular, function($query){
                $query->where('batch_no', $this->batch_no);
                })
            ->paginate(10);
   }

   public function get_delinquents(){
      return Bill::selectRaw('sum(bill-initial_payment) as balance, tenant_uuid, owner_uuid, guest_uuid, particular_id, bill,
      initial_payment, created_at, unit_uuid')
      ->where('property_uuid', Session::get('property_uuid'))
      ->where('bill', '>','initial_payment')
      ->whereNotNull('tenant_uuid')
      ->where('start', '>', Carbon::now()->subMonth()->toDateTimeString())
      ->groupBy('tenant_uuid')
      ->orderBy('balance', 'desc')
      ->paginate(10);
   }

   public function get_bills()
   {
      $bills = '';

      if($this->filter_bill_to === 'delinquent')
      {
         $bills = $this->get_delinquents();
      }else{
         if($this->posted_dates === 'monthly'){
            $bills = $this->get_bills_per_period(now()->subdays(30));
         }elseif($this->posted_dates === 'quarterly'){
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
                'property_uuid' => Session::get('property_uuid'),
                'particular_id' => $particular_id
                ],
                [
                'property_uuid' => Session::get('property_uuid'),
                'particular_id' => $particular_id
                ]
                );
         }

         session()->flash('success', 'Changes Saved!');
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

      $tenant_uuid = Contract::where('property_uuid', Session::get('property_uuid'))
      ->where('contracts.status','active')
      ->pluck('tenant_uuid');

      $bill_no = app('App\Http\Controllers\Features\BillController')->getLatestBillNo(Session::get('property_uuid'));

      $batch_no = app('App\Http\Controllers\Features\BillController')->generate_bill_batch_no($bill_no);

      $bill_count = Contract::where('property_uuid', Session::get('property_uuid'))->where('status', 'active')->count();

      try{
         for($i=0; $i<$bill_count; $i++){
            $unit_uuid=Contract::where('property_uuid', Session::get('property_uuid'))
                ->where('contracts.status','active')
                ->where('tenant_uuid', $tenant_uuid[$i])
                ->pluck('unit_uuid');

            $reference_no = Tenant::find($tenant_uuid[$i]);

            $unit_uuid = $unit_uuid[0];
            $rent = Unit::find($unit_uuid)->rent;

            $attributes['unit_uuid']= $unit_uuid;
            $attributes['tenant_uuid'] = $tenant_uuid[$i];

               if($this->particular_id === '8'){
                    $attributes['bill'] = -($this->bill);
               }else{
                    $attributes['bill'] = $rent;
               }

                $attributes['bill_no'] = $bill_no++;
                $attributes['reference_no'] = $reference_no->bill_reference_no;
                $attributes['user_id'] = auth()->user()->id;
                $attributes['due_date'] = Carbon::parse($this->start)->addDays(7);
                $attributes['property_uuid'] = Session::get('property_uuid');
                $attributes['batch_no'] = $batch_no;
                $attributes['status'] = 'unpaid';
                $attributes['created_at'] = Carbon::now();

                Bill::create($attributes);

                }

                return redirect('/property/'.Session::get('property_uuid').'/bill/'.'customized'.'/'.$batch_no)->with('success', 'Changes Saved!');

            }catch(\Exception $e)
            {
                return redirect(url()->previous())->with('error', $e);
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

   public function get_statuses()
   {
      return Bill::where('bills.property_uuid', Session::get('property_uuid'))
      ->groupBy('status')
      ->get();
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

   public function exportBills(){

      return redirect('/property/'.Session::get('property_uuid').'/bill/export/status/'.$this->status.'/particular/'.$this->particular.'/date/'.$this->posted_dates);
   }

    public function render()
   {
      $particulars = app('App\Http\Controllers\Utilities\PropertyParticularController')->index(Session::get('property_uuid'));

      $dates_posted = $this->get_posted_dates();

      $period_covered_starts = $this->get_period_covered_starts();

      $period_covered_ends = $this->get_period_covered_ends();

      $propertyBillsCount = Property::find(Session::get('property_uuid'))->bills->count();

      return view('livewire.features.bill.bill-index-component', [
         'bills' => $this->get_bills(),
         'collections' => Collection::where('property_uuid', Session::get('property_uuid'))->posted()->get(),
         'statuses' =>  $this->get_statuses(),
         'particulars' => $particulars,
         'dates_posted' => $dates_posted,
         'period_covered_starts' => $period_covered_starts,
         'period_covered_ends' => $period_covered_ends,
         'propertyBillsCount' => $propertyBillsCount
     ]);
   }

}
