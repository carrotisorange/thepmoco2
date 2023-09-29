<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use App\Models\Owner;
use App\Models\Bill;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Collection;
use Carbon\Carbon;
use DB;
use Session;
use App\Models\Property;

class OwnerBillComponent extends Component
{
     use WithPagination;

      public $owner;

      public $selectedBills = [];
      public $selectAll = false;  
      public $status = 'unpaid';
      public $particular;

      public $view = 'listView';

      public $isPaymentAllowed = true;

      public $isIndividualView = true;

      public $owner_uuid;

      public $user_type = 'owner';

      public function mount($owner){
         $this->owner_uuid = $owner->uuid;
         $this->property = Property::find(Session::get('property_uuid'));
      }

     public function removeBills()
     {
       
        if(!Bill::whereIn('id', $this->selectedBills)->where('status', 'unpaid')->delete())
        {
            $this->selectedBills = [];

            return back()->with('error', 'Bill cannot be deleted.');
        }

        //Bill::destroy($this->selectedBills);

        $this->selectedBills = [];

        return back()->with('success', 'Success!');
     }

     public function postBills()
     {
         try{
            
            

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
      //generate collection acknowledgement receipt no
      $collection_ar_no = Property::find(Session::get('property_uuid'))->acknowledgementreceipts->max('ar_no')+1;

      //generate a collection batch no
      $collection_batch_no = Carbon::now()->timestamp.''.$collection_ar_no;
      

      for($i=0; $i<count($this->selectedBills); $i++){

         try 
         {
            //begin the transaction
            DB::transaction(function () use ($i, $collection_ar_no, $collection_batch_no) {
            
            //get the attributes for collections
            $particular_id = Bill::find($this->selectedBills[$i])->particular_id;
            $owner_uuid = $this->owner->uuid;
            $unit_uuid = Bill::find($this->selectedBills[$i])->unit_uuid;
            $property_uuid = Session::get('property_uuid');

         
            $bill_id = Bill::find($this->selectedBills[$i])->id;
            $bill_reference_no = Owner::find($this->owner->uuid)->bill_reference_no;
            $form = 'cash';
            $collection = Bill::find($this->selectedBills[$i])->bill;
            $is_posted = false;

            //call the method for storing new collection
            $collection_id =  app('App\Http\Controllers\CollectionController')->store(
               '',
               $owner_uuid,
               '',
               $unit_uuid,
               $property_uuid,
               $bill_id,
               $bill_reference_no,
               $form,
               $collection,
               $collection_batch_no,
               $collection_ar_no,
               $is_posted,
         );

            //update selected bill to the generated collection batch no
            Bill::where('id', $this->selectedBills[$i])
            ->where('owner_uuid', $this->owner->uuid)
            ->update([
               'batch_no' => $collection_batch_no
            ]);

            //mark collection as deposit if it's either utility or rent deposit
            if($particular_id === 3 || $particular_id === 4)
            {
               Collection::where('id', $collection_id)
               ->update([
                  'is_deposit' => true
               ]);
            }
            }
         );
         }
            catch (\Throwable $e) {
               return back()->with('error',$e);
         } 
      }
         return redirect('/property/'.Session::get('property_uuid').'/owner/'.$this->owner->uuid.'/bills/'.$collection_batch_no.'/pay');

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

          return redirect('/owner/'.$this->owner->uuid.'/bills')->with('success','Success!');

     }

   public function updatedSelectAll($value)
   {
      if($value)
      {
         $this->selectedBills = Bill::where('owner_uuid', $this->owner->uuid)
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

      $bills = Bill::where('owner_uuid', $this->owner->uuid)
      ->orderBy('bill_no','desc')
      ->when($this->status, function($query){
         $query->where('status', $this->status);
      })
      ->when($this->particular, function($query){
      $query->where('particular_id', $this->particular);
      })
      ->get();

      $statuses = Bill::where('bills.property_uuid', Session::get('property_uuid'))
      ->select('status', DB::raw('count(*) as count'))
      ->groupBy('status')
      ->get();

      $unpaid_bills = Owner::find($this->owner->uuid)
      ->bills()
      ->where('status', 'unpaid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill');

      $partially_paid_bills = Owner::find($this->owner->uuid)
      ->bills()
      ->where('status', 'partially_paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill') - Owner::find($this->owner->uuid)
      ->bills()
      ->where('status', 'partially_paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('initial_payment');

      $paid_bills = Owner::find($this->owner->uuid)
      ->bills()
      ->where('status', 'paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill');

      $total_count = Bill::whereIn('id', $this->selectedBills)
      ->whereIn('status', ['paid', 'partially_paid'])
      ->count();

      $total_bills = Owner::find($this->owner->uuid)->bills->sum('bill');

      return view('livewire.owner-bill-component',[
         'bills' => $bills,
         'total' => ($unpaid_bills + $partially_paid_bills) - $paid_bills,
         'total_count' => $total_count,
         'total_paid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_bills' => $bills,
         'statuses' => $statuses,
         'particulars' => app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property_uuid'))
        ]);
    }
}
