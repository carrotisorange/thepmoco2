<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use App\Models\Tenant;
use App\Models\Bill;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Collection;
use Carbon\Carbon;
use DB;
use Session;
use App\Models\Property;

class TenantBillComponent extends Component
{
     use WithPagination;

    public $tenant;

     public $selectedBills = [];
     public $selectAll = false;  
     public $status;

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

     public function postBills()
     {
         try{
            
            sleep(1);

            DB::beginTransaction();
            
            DB::commit();

         }catch(\Exception $e)
         { 
            DB::rollback();

            return back()->with('error','Cannot perform your action.');
         }
     }

   public function payBills()
   {
      $collection_ar_no = Property::find(Session::get('property'))->acknowledgementreceipts->max('ar_no')+1;

      $collection_batch_no = Carbon::now()->timestamp.''.$collection_ar_no;

      for($i=0; $i<count($this->selectedBills); $i++){
        $collection_id =  Collection::insertGetId([
            'tenant_uuid' => $this->tenant->uuid,
            'unit_uuid' => Bill::find($this->selectedBills[$i])->unit_uuid,
            'property_uuid' => Session::get('property'),
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

      return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant->uuid.'/bills/'.$collection_batch_no.'/pay');
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

          return redirect('/tenant/'.$this->tenant->uuid.'/bills')->with('success','Bill is successfully marked as unpaid.');

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
      ->orderBy('bill_no','asc')
      ->when($this->status, function($query){
         $query->where('status', $this->status);
      })
      ->get();

      $statuses = Bill::where('bills.property_uuid', Session::get('property'))
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

      $balance = ($unpaid_bills + $partially_paid_bills) - $paid_bills;

      $total_count = Bill::whereIn('id', $this->selectedBills)
      ->whereIn('status', ['paid', 'partially_paid'])
      ->count();

      $total_bills = Tenant::find($this->tenant->uuid)->bills->sum('bill');

      return view('livewire.tenant-bill-component',[
         'bills' => $bills,
         'total' => $balance,
         'total_count' => $total_count,
         'total_paid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_bills' => $bills,
         'statuses' => $statuses
        ]);
    }
}
