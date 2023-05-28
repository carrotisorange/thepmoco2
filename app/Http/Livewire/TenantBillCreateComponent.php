<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use App\Models\Tenant;
use App\Models\Bill;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Collection;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;
use App\Models\Property;
use App\Models\Particular;
use App\Models\PropertyParticular;


class TenantBillCreateComponent extends Component
{
   use WithPagination;

   public $property;
   public $tenant;

   public $selectedBills = [];
   public $selectAll = false;  
   public $status;

   public $particular_id;
   public $unit_uuid;
   public $start;
   public $end;
   public $bill;

   public $view = 'listView';

   public $isPaymentAllowed = true;

   public $new_particular;

   //filters
   public $particular;
   public $unit;

   public function removeBills()
   {
      

      if(!Bill::whereIn('id', $this->selectedBills)->where('status', 'unpaid')->delete())
      {
         $this->selectedBills = [];

         return back()->with('error', 'Bill cannot be deleted.');
      }

      Bill::destroy($this->selectedBills);

      $this->selectedBills = [];

      return back()->with('success', 'Success!');
   }

   public function mount(){
      $this->start = Carbon::now()->format('Y-m-d');
      $this->end = Carbon::now()->addMonth()->format('Y-m-d');
   }

   protected function rules()
   {
      return [
         'particular_id' => ['required', Rule::exists('particulars', 'id')],
         'start' => 'required|date',
         'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
         'end' => 'nullable|date|after:start',
         'bill' => 'required|numeric|min:1',
      ];
   }

   public function updated($propertyName)
   {
      $this->validateOnly($propertyName);
   }

   public function storeBill(){

      

      $this->validate();

      try {

         $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no($this->property->uuid);

         if($this->particular_id === '8'){
            $this->bill *=-1;
         }
         
         Bill::create([
            'bill_no' => $bill_no,
            'unit_uuid' => $this->unit_uuid,
            'particular_id' => $this->particular_id,
            'start' => $this->start,
            'end' => $this->end,
            'bill' => $this->bill,
            'reference_no' => $this->tenant->reference_no,
            'due_date' => Carbon::parse($this->start)->addDays(7),
            'user_id' => auth()->user()->id,
            'property_uuid' => $this->property->uuid,
            'tenant_uuid' => $this->tenant->uuid,
            'is_posted' => true
         ]);

            // app('App\Http\Controllers\BillController')->store($this->property->uuid, auth()->user()->id, 1, 3);

            app('App\Http\Controllers\PointController')->store($this->property->uuid, auth()->user()->id, 1, 3);

            return redirect('/property/'.$this->property->uuid.'/tenant/'.$this->tenant->uuid.'/bills')->with('success','Success!');
      }
        catch(\Exception $e)
        {
            return back()->with('error',$e);
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

   public function payBills()
   {
      

      $collection_ar_no = Property::find($this->property->uuid)->acknowledgementreceipts->max('ar_no')+1;

      $collection_batch_no = Carbon::now()->timestamp.''.$collection_ar_no;

      for($i=0; $i<count($this->selectedBills); $i++){
        $collection_id =  Collection::insertGetId([
            'tenant_uuid' => $this->tenant->uuid,
            'unit_uuid' => Bill::find($this->selectedBills[$i])->unit_uuid,
            'property_uuid' => $this->property->uuid,
            'user_id' => auth()->user()->id,
            'bill_id' => Bill::find($this->selectedBills[$i])->id,
            'bill_reference_no' => Tenant::find($this->tenant->uuid)->bill_reference_no,
            'form' => 'cash',
            'collection' => 0,
            'batch_no' => $collection_batch_no,
            'ar_no' => $collection_ar_no,
            'is_posted' => 0
         ]);

         Bill::where('id', $this->selectedBills[$i])
         ->where('tenant_uuid', $this->tenant->uuid)
         ->update([
            'batch_no' => $collection_batch_no
         ]);

         $particular_id = Bill::find($this->selectedBills[$i])->particular_id;

         if($particular_id === 3 || $particular_id === 4)
         {
             Collection::where('id', $collection_id)
             ->update([
               'is_deposit' => 1
             ]);
         }
      }

      return redirect('/property/'.$this->property->uuid.'/tenant/'.$this->tenant->uuid.'/bills/'.$collection_batch_no.'/pay');
   }

     public function unpayBills()
     {
         Bill::whereIn('id', $this->selectedBills)
         ->update([
            'status' => 'unpaid',
            'initial_payment' => 0
         ]);

         $collection_batch_no = Collection::where('bill_id', $this->selectedBills[0])->pluck('batch_no');

         AcknowledgementReceipt::where('collection_batch_no', $collection_batch_no)->delete();

         Collection::whereIn('bill_id', $this->selectedBills)->delete();

          $this->selectedBills = [];

          return redirect('/tenant/'.$this->tenant->uuid.'/bills')->with('success', 'Success!');

     }

   public function updatedSelectAll($value)
   {
      if($value)
      {
         $this->selectedBills = Bill::where('tenant_uuid', $this->tenant->uuid)
            ->when($this->status, function($query){
            $query->where('status', $this->status);
         })->pluck('id');
      }else
      {
         $this->selectedBills = [];
      }
   }

    public function render()
    {

      $bills = Tenant::find($this->tenant->uuid)
      ->bills()
      ->orderBy('bill_no','desc')
      ->when($this->status, function($query){
         $query->where('status', $this->status);
      })
       ->when($this->particular, function($query){
       $query->where('particular_id', $this->particular);
       })
        ->when($this->unit, function($query){
        $query->where('unit_uuid', $this->unit);
        })
      ->get();

      $statuses = Bill::where('bills.property_uuid', $this->property->uuid)
      ->select('status', DB::raw('count(*) as count'))
      ->groupBy('status')
      ->get();



      $unpaid_bills = Tenant::find($this->tenant->uuid)
      ->bills()
      ->where('status', 'unpaid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill');

      $partially_paid_bills = Tenant::find($this->tenant->uuid)
      ->bills()
      ->where('status', 'partially_paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill') - Tenant::find($this->tenant->uuid)
      ->bills()
      ->where('status', 'partially_paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('initial_payment');

      $paid_bills = Tenant::find($this->tenant->uuid)
      ->bills()
      ->where('status', 'paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill');

      $total_count = Bill::whereIn('id', $this->selectedBills)
      ->whereIn('status', ['paid', 'partially_paid'])
      ->count();

      $particulars = app('App\Http\Controllers\PropertyParticularController')->index($this->property->uuid);

      return view('livewire.tenant-bill-create-component',[
         'bills' => $bills,
         'total' => ($unpaid_bills + $partially_paid_bills) - $paid_bills,
         'total_count' => $total_count,
         'total_paid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_bills' => $bills,
         'statuses' => $statuses,
         'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'unpaid_bills' => app('App\Http\Controllers\TenantBillController')->get_tenant_balance($this->tenant->uuid),
         'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($this->property->uuid),
         'units' => app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($this->tenant->uuid),
         'note_to_bill' => $this->property->note_to_bill,
         'particulars' => $particulars
        ]);
    }
}
