<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Collection;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\{Property,Particular,PropertyParticular,Tenant,Bill,Contract};

class TenantBillCreateComponent extends Component
{
   use WithPagination;
   public $tenant;

   public $selectedBills = [];
   public $selectAll = false;
   public $status = 'unpaid';

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

   public $isIndividualView = true;

   public $tenant_uuid;

   public $user_type = 'tenant';


   public function updatedParticularId(){
      if($this->particular_id === '1'){
         $rent = Contract::where('tenant_uuid', $this->tenant->uuid)->where('unit_uuid', $this->unit_uuid)->pluck('rent')->first();

         $this->bill = $rent;
      }
   }

   public function mount($tenant){
      $this->start = Carbon::now()->format('Y-m-d');
      $this->end = Carbon::now()->addMonth()->format('Y-m-d');
      $this->tenant_uuid = $tenant->uuid;
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

        app('App\Http\Controllers\Features\BillController')->storeTenantBill(
            $this->particular_id,
            $this->bill,
            $this->unit_uuid,
            $this->start,
            $this->end,
            $this->tenant
        );
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

   public function payBills()
   {
      //generate collection acknowledgement receipt no
      $collection_ar_no = Property::find(Session::get('property_uuid'))->acknowledgementreceipts->max('ar_no')+1;

      //generate a collection batch no
      $collection_batch_no = Carbon::now()->timestamp.''.$collection_ar_no;


      for($i=0; $i<count($this->selectedBills); $i++){

         try
         {
            $bill = Bill::find($this->selectedBills[$i]);

            $contract = Contract::where('uuid', $bill->contract_uuid);

            $diffOfContractInMonths = Carbon::parse($contract->pluck('end')->last())->diffInMonths(Carbon::parse($contract->pluck('start')->last()));

            $contractDuration = null;

            if($diffOfContractInMonths>6){
                $contractDuration = 'long_term';
            }else{
                $contractDuration = 'short_term';
            }

            //get the attributes for collections
            $particular_id = $bill->particular_id;
            $tenant_uuid = $this->tenant->uuid;
            $unit_uuid = $bill->unit_uuid;
            $property_uuid = $bill->property_uuid;

            $bill_id = $bill->id;
            $bill_reference_no = Tenant::find($this->tenant->uuid)->bill_reference_no;
            $form = 'cash';
            $collection = $bill->bill;
            $is_posted = false;

            DB::beginTransaction();

            //call the method for storing new collection
            $collection_id =  app('App\Http\Controllers\Features\CollectionController')->store(
               $tenant_uuid,
               '',
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
               $contractDuration
         );

            //update selected bill to the generated collection batch no
            Bill::where('id', $this->selectedBills[$i])
            ->where('tenant_uuid', $this->tenant->uuid)
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
            DB::commit();

         }
            catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error',$e);
         }
      }

      return redirect('/property/'.Session::get('property_uuid').'/tenant/'.$this->tenant->uuid.'/bills/'.$collection_batch_no.'/pay');

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
      ->posted()
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

      $statuses = Bill::where('bills.property_uuid', Session::get('property_uuid'))
      ->select('status', DB::raw('count(*) as count'))
      ->groupBy('status')
      ->get();


      $unpaid_bills = Tenant::find($this->tenant->uuid)
      ->bills()
        ->posted()
      ->where('status', 'unpaid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill');

      $paid_bills = Tenant::find($this->tenant->uuid)
      ->bills()
        ->posted()
      ->where('status', 'paid')
      ->whereIn('id', $this->selectedBills)
      ->sum('bill');

      $total_count = Bill::whereIn('id', $this->selectedBills)
      ->where('status', 'paid')
      ->count();

      $particulars = app('App\Http\Controllers\Utilities\PropertyParticularController')->index(Session::get('property_uuid'));

      $noteToBill = Property::find(Session::get('property_uuid'))->note_to_bill;

      return view('livewire.tenant-bill-create-component',[
         'bills' => $bills,
         'total' => ($unpaid_bills) - $paid_bills,
         'total_count' => $total_count,
         'total_paid_bills' => $bills->where('status', 'unpaid'),
         'total_unpaid_bills' => $bills->where('status', 'unpaid'),
         'total_bills' => $bills,
         'statuses' => $statuses,
         'total_unpaid_bills' => $bills->where('status','unpaid'),
         'unpaid_bills' => app('App\Http\Controllers\Features\BillController')->get_tenant_balance($this->tenant->uuid),
         'units' => app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($this->tenant->uuid),
         'note_to_bill' => $noteToBill,
         'particulars' => $particulars
        ]);
    }
}
