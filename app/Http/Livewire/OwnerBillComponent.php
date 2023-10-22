<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use App\Models\Owner;
use App\Models\Bill;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Collection;
use App\Models\DeedOfSale;
use Carbon\Carbon;
use DB;
use Session;
use App\Models\Property;
use App\Models\Unit;
use Illuminate\Validation\Rule;

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


         public $particular_id;
         public $unit_uuid;
         public $start;
         public $end;
         public $bill;


      public function mount($owner){
         $this->owner_uuid = $owner->uuid;
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

        $bill_no = app('App\Http\Controllers\BillController')->getLatestBillNo(Session::get('property_uuid'));
        $marketing_fee = Unit::find($this->unit_uuid)->marketing_fee;
        $management_fee = Unit::find($this->unit_uuid)->management_fee;

        if($this->particular_id === '8'){
            $this->bill *=-1;
        }elseif($this->particular_id === '1'){
            $this->bill = ($this->bill)-($marketing_fee + $management_fee);
        }else{
            $this->bill = $this->bill;
        }

        $bill_id = Bill::insertGetId([
            'bill_no' => $bill_no,
            'unit_uuid' => $this->unit_uuid,
            'particular_id' => $this->particular_id,
            'start' => $this->start,
            'end' => $this->end,
            'bill' => $this->bill,
            'reference_no' => $this->owner->reference_no,
            'due_date' => Carbon::parse($this->start)->addDays(7),
            'user_id' => auth()->user()->id,
            'property_uuid' => Session::get('property_uuid'),
            'owner_uuid' => $this->owner->uuid,
            'status' => 'unpaid',
            'created_at' => Carbon::now(),
            'is_posted' => true
        ]);


        if($this->particular_id === '1'){
            if($marketing_fee>0){
                Bill::create([
                'bill_id' => $bill_id,
                'bill_no' => $bill_no+1,
                'unit_uuid' => $this->unit_uuid,
                'particular_id' => 71,
                'start' => $this->start,
                'end' => $this->end,
                'bill' => $marketing_fee,
                'reference_no' => $this->owner->reference_no,
                'due_date' => Carbon::parse($this->start)->addDays(7),
                'user_id' => auth()->user()->id,
                'property_uuid' => Session::get('property_uuid'),
                'owner_uuid' => $this->owner->uuid,
                'is_posted' => true,
                'created_at' => Carbon::now(),
            ]);
        }

        if($management_fee>0){
            Bill::create([
            'bill_id' => $bill_id,
            'bill_no' => $bill_no+2,
            'unit_uuid' => $this->unit_uuid,
            'particular_id' => 72,
            'start' => $this->start,
            'end' => $this->end,
            'bill' => $management_fee,
            'reference_no' => $this->owner->reference_no,
            'due_date' => Carbon::parse($this->start)->addDays(7),
            'user_id' => auth()->user()->id,
            'property_uuid' => Session::get('property_uuid'),
            'owner_uuid' => $this->owner->uuid,
            'is_posted' => true,
            'created_at' => Carbon::now(),
            ]);
        }
        }

        // app('App\Http\Controllers\BillController')->store(Session::get('property_uuid'), auth()->user()->id, 1, 3);

        app('App\Http\Controllers\PointController')->store(Session::get('property_uuid'), auth()->user()->id, 1, 3);

        return redirect('/property/'.Session::get('property_uuid').'/owner/'.$this->owner->uuid.'/bills')->with('success','Changes Saved!');
        }
        catch(\Exception $e)
        {
            return back()->with('error',$e);
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
            catch (\Exception $e) {
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

          return redirect('/owner/'.$this->owner->uuid.'/bills')->with('success','Changes Saved!');

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

        $noteToBill = Property::find(Session::get('property_uuid'))->note_to_bill;

      return view('livewire.owner-bill-component',[
         'bills' => $bills,
         'total' => ($unpaid_bills + $partially_paid_bills) - $paid_bills,
         'total_count' => $total_count,
         'total_paid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_bills' => $bills,
         'statuses' => $statuses,
         'particulars' => app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property_uuid')),
         'note_to_bill' => $noteToBill,
        'units' => DeedOfSale::where('owner_uuid', $this->owner->uuid)->get(),
        ]);
    }
}
