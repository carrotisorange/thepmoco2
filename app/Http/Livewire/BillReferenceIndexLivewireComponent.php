<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\{Tenant,Owner,Guest,Bill, Property,Contract, Collection, DeedOfSale, Booking, Particular, PropertyParticular};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class BillReferenceIndexLivewireComponent extends Component
{
    public $type;
    public $uuid;

    public $billStatus;
    public $billParticularId;
    public $billUnitUuid;

    public $selectedBills = [];

    public $particular_id;
    public $unit_uuid;
    public $start;
    public $end;
    public $bill;
    public $new_particular;

    public function updatedSelectAll($value)
    {
      if($value)
      {
         $this->selectedBills = Bill::where($this->type.'_uuid', $this->uuid)
            ->when($this->status, function($query){
            $query->where('status', $this->billStatus);
         })->pluck('id');
      }else
      {
         $this->selectedBills = [];
      }
    }

    public function getBills(){

        $bills = $this->getBillTo();

        return $bills->bills()
        ->posted()
        ->when($this->billStatus, function($query){
        $query->where('status', $this->billStatus);
        })
        ->when($this->billParticularId, function($query){
        $query->where('particular_id', $this->billParticularId);
        })
        ->when($this->billUnitUuid, function($query){
        $query->where('unit_uuid', $this->billUnitUuid);
        })
        ->orderBy('bill_no','desc')
        ->get();

    }

    public function getBillTo(){
        $billTo = null;

        if($this->type == 'tenant'){
            $billTo = Tenant::find($this->uuid);
        }elseif($this->type == 'owner'){
            $billTo = Owner::find($this->uuid);
        }else{
            $billTo = Guest::find($this->uuid);
        }
        return $billTo;
    }

    public function getBillToName(){
        $billToName = null;

        if($this->type == 'tenant'){
            $billToName = Tenant::find($this->uuid)->tenant;
        }elseif($this->type == 'owner'){
            $billToName = Owner::find($this->uuid)->owner;
        }else{
            $billToName = Guest::find($this->uuid)->guest;
        }
        return $billToName;

    }

    public function getBillParticulars(){
        return Bill::select('*')->join('particulars', 'bills.particular_id', 'particulars.id')->where($this->type.'_uuid', $this->uuid)->groupBy('particular_id')->posted()->get();
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
            $tenant_uuid = null;
            $owner_uuid = null;
            $guest_uuid = null;

            if($this->type == 'tenant'){
                $tenant_uuid = $this->uuid;
            }elseif($this->type == 'owner'){
                $owner_uuid = $this->uuid;
            }else{
                $guest_uuid = $this->uuid;
            }

            $unit_uuid = $bill->unit_uuid;
            $property_uuid = $bill->property_uuid;

            $bill_id = $bill->id;
            $bill_reference_no = $this->getBillTo()->bill_reference_no;
            $form = 'cash';
            $collection = $bill->bill;
            $is_posted = false;

            DB::beginTransaction();

            //call the method for storing new collection
            $collection_id =  app('App\Http\Controllers\Features\CollectionController')->store(
               $tenant_uuid,
               $owner_uuid,
               $guest_uuid,
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
            ->where($this->type.'_uuid', $this->getBillTo()->uuid)
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
                Log::error($e);
                return back()->with('error',$e);
         }
      }

      return redirect('/property/'.Session::get('property_uuid').'/'.$this->type.'/'.$this->getBillTo()->uuid.'/bills/'.$collection_batch_no.'/pay');

    }

    public function getUnits(){

        $units = null;

        if($this->type=='tenant'){
            $units = app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($this->uuid);
        }elseif($this->type=='owner'){
            $units = DeedOfSale::where('owner_uuid', $this->uuid)->get();
        }else{
            $units = Booking::where('guest_uuid', $this->uuid)->groupBy('unit_uuid')->get();
        }

        return $units;

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


    public function storeBill(){

        $this->validate();

        app('App\Http\Controllers\Features\BillController')->storeTenantBill(
            $this->particular_id,
            $this->bill,
            $this->unit_uuid,
            $this->start,
            $this->end,
            $this->type,
            $this->uuid
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


    public function render()
    {

        $bills = $this->getBills();

        $billParticulars = $this->getBillParticulars();

        $billTo = $this->getBillToName();

        $total = $this->getBills()->where('status', 'unpaid')->whereIn('id', $this->selectedBills)->sum('bill') - $this->getBills()->where('status', 'paid')->whereIn('id', $this->selectedBills)->sum('bill');

        $units = $this->getUnits();

        $email = $this->getBillTo()->email;

        return view('livewire.bill-reference-index-livewire-component',compact('bills', 'billParticulars', 'billTo', 'total', 'units', 'email'));
    }
}
