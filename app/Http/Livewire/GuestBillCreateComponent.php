<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use App\Models\Guest;
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
use App\Models\Unit;


class GuestBillCreateComponent extends Component
{
   use WithPagination;

   public $property;
   public $guest;

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
      sleep(2);

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
         // 'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
         'end' => 'nullable|date|after:start',
         'bill' => 'required|numeric|min:1',
      ];
   }

   public function updated($propertyName)
   {
      $this->validateOnly($propertyName);
   }

   public function storeBill(){

      sleep(2);

      $this->validate();

      try {

         $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no($this->property->uuid);

         if($this->particular_id === '8'){
            $this->bill *=-1;
         }
         
         Bill::create([
            'bill_no' => $bill_no,
            'unit_uuid' => $this->guest->unit_uuid,
            'particular_id' => $this->particular_id,
            'start' => $this->start,
            'end' => $this->end,
            'bill' => $this->bill,
            'reference_no' => $this->guest->uuid,
            'due_date' => Carbon::parse($this->start)->addDays(7),
            'user_id' => auth()->user()->id,
            'property_uuid' => $this->property->uuid,
            'guest_uuid' => $this->guest->uuid,
            'is_posted' => true
         ]);

            app('App\Http\Controllers\PointController')->store($this->property->uuid, auth()->user()->id, 1, 3);

            return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest->uuid.'/bills')->with('success','Success!');
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
      sleep(2);

      $collection_ar_no = Property::find($this->property->uuid)->acknowledgementreceipts->max('ar_no')+1;

      $collection_batch_no = Carbon::now()->timestamp.''.$collection_ar_no;

      for($i=0; $i<count($this->selectedBills); $i++){
        $collection_id =  Collection::insertGetId([
            'guest_uuid' => $this->guest->uuid,
            'unit_uuid' => Bill::find($this->selectedBills[$i])->unit_uuid,
            'property_uuid' => $this->property->uuid,
            'user_id' => auth()->user()->id,
            'bill_id' => Bill::find($this->selectedBills[$i])->id,
            'bill_reference_no' => Guest::find($this->guest->uuid)->bill_reference_no,
            'form' => 'cash',
            'collection' => 0,
            'batch_no' => $collection_batch_no,
            'ar_no' => $collection_ar_no,
            'is_posted' => 0
         ]);

         Bill::where('id', $this->selectedBills[$i])
         ->where('guest_uuid', $this->guest->uuid)
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

      return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest->uuid.'/bills/'.$collection_batch_no.'/pay');
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

          return redirect('/guest/'.$this->guest->uuid.'/bills')->with('success', 'Success!');

     }

   public function updatedSelectAll($value)
   {
      if($value)
      {
         $this->selectedBills = Bill::where('guest_uuid', $this->guest->uuid)
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

      $bills = Guest::find($this->guest->uuid)
      ->bills()
      ->orderBy('bill_no','desc')
      ->when($this->status, function($query){
         $query->where('status', $this->status);
      })
       ->when($this->particular, function($query){
       $query->where('particular_id', $this->particular);
       })
      ->get();

      $statuses = Bill::where('bills.property_uuid', $this->property->uuid)
      ->select('status', DB::raw('count(*) as count'))
      ->groupBy('status')
      ->get();

      $unpaid_bills = Guest::find($this->guest->uuid)
      ->bills()
      ->where('status', 'unpaid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill');

      $partially_paid_bills = Guest::find($this->guest->uuid)
      ->bills()
      ->where('status', 'partially_paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill') - Guest::find($this->guest->uuid)
      ->bills()
      ->where('status', 'partially_paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('initial_payment');

      $paid_bills = Guest::find($this->guest->uuid)
      ->bills()
      ->where('status', 'paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill');

      $total_count = Bill::whereIn('id', $this->selectedBills)
      ->whereIn('status', ['paid', 'partially_paid'])
      ->count();

      $particulars = app('App\Http\Controllers\PropertyParticularController')->index($this->property->uuid);

      return view('livewire.guest-bill-create-component',[
         'bills' => $bills,
         'total' => ($unpaid_bills + $partially_paid_bills) - $paid_bills,
         'total_count' => $total_count,
         'total_paid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'total_bills' => $bills,
         'statuses' => $statuses,
         'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
         'unpaid_bills' => Bill::where('guest_uuid', $this->guest->uuid)->whereIn('status', ['unpaid', 'partially_paid'])->where('bill','>', 0)->orderBy('bill_no','desc')->get(),
         'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($this->property->uuid),
         'units' => Unit::where('uuid', $this->guest->unit_uuid)->get(),
         'note_to_bill' => $this->property->note_to_bill,
         'particulars' => $particulars
        ]);
    }
}
