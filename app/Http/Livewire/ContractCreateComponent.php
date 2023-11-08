<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use DB;
use Livewire\WithFileUploads;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Str;
use App\Models\Bill;
use App\Models\UserProperty;

class ContractCreateComponent extends Component
{
     use WithFileUploads;

     //list of passed parameters
      public $unit;
      public $tenant;

      //list of input fields
      public $start;
      public $end;
      public $rent;
      public $discount;
      public $interaction_id = 11;
      public $contract;
      public $referral;
      public $sendContractToTenant = false;
      public $autoGenerateBills = true;

      public function mount($unit, $tenant)
      {
        $this->unit = $unit;
        $this->tenant = $tenant;
        $this->rent = $unit->rent;
        $this->discount = $unit->discount;
        // $this->end = Carbon::now()->addYear()->format('Y-m-d');
        $this->start = Carbon::now()->format('Y-m-d');

      }

      protected function rules()
      {
        return [
          'start' => 'required|date',
          'end' => 'required|date|after:start',
          'rent' => 'required',
          'discount' => 'required',
          'interaction_id' => 'nullable',
          'contract' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
        ];
      }

      public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
      }

      public function makeReservation()
      {


        $contract_uuid = app('App\Http\Controllers\Features\PropertyController')->generate_uuid();

        app('App\Http\Controllers\Features\ContractController')->store(auth()->user()->id, $contract_uuid, Session::get('property_uuid'), $this->start, $this->end, $this->interaction_id, $this->rent, $this->tenant->uuid, $this->unit->uuid, 'reserved', 4, 'reserved', 1, 1, $this->referral, $this->sendContractToTenant);

        return
        redirect('/property/'.Session::get('property_uuid').'/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$contract_uuid)->with('success','Changes Saved!');
      }

      public function submitForm()
      {

        $this->validate();

        $contract_uuid = app('App\Http\Controllers\Features\PropertyController')->generate_uuid();

        app('App\Http\Controllers\Features\ContractController')->store(auth()->user()->id, $contract_uuid, Session::get('property_uuid'), $this->start, $this->end, $this->interaction_id, $this->rent, $this->tenant->uuid, $this->unit->uuid, 'pendingmovein', 4, 'active', 5, 1, $this->referral, $this->sendContractToTenant);

        if($this->autoGenerateBills){
          $this->store_bill();
        }

        if($this->contract)
        {
          Contract::where('uuid', $contract_uuid)->update(
            [
              'contract' => $this->contract->store('contracts')
            ]
          );
        }

        return redirect('/property/'.Session::get('property_uuid').'/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$contract_uuid.'/inventory/create')->with('success', 'Changes Saved!');

      }

      public function store_bill(){
        Bill::create(
            [
                  'unit_uuid' => $this->unit->uuid,
                  'tenant_uuid' => $this->tenant->uuid,
                  'particular_id' => 1,
                  'start' => $this->start,
                  'end' => Carbon::parse($this->start)->addMonth(),
                  'bill' => $this->rent,
                  'property_uuid' => Session::get('property_uuid'),
                  'bill_no'=>
                  app('App\Http\Controllers\Features\BillController')->getLatestBillNo(Session::get('property_uuid')),
                  'user_id' => auth()->user()->id,
                  'due_date' => Carbon::parse($this->start)->addDays(7),
                  'is_posted' => true
                  ]
          );
      }

      public function removeContract()
      {
         $this->contract = '';
      }

      public function render()
      {
        return view('livewire.contract-create-component',[
          'interactions' => app('App\Http\Controllers\InteractionController')->index(),
        ]);
      }
}
