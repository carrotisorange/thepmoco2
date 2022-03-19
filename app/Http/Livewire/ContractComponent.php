<?php

namespace App\Http\Livewire;

use App\Mail\SendContractMailToTenant;
use App\Models\Contract;
use App\Models\Unit;
use Illuminate\Support\Str;
use DB;
use App\Models\Bill;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Property;
use Carbon\Carbon;
use Session;

class ContractComponent extends Component
{
     use WithFileUploads;

      public $unit;
      public $tenant;

      public function mount($unit, $tenant)
      {
      $this->unit = $unit;
      $this->tenant = $tenant;
      $this->rent = $unit->rent;
      $this->discount = $unit->discount;
      $this->end = Carbon::now()->addYear()->format('Y-m-d');
      $this->start = Carbon::now()->format('Y-m-d');
      }

      public $start;
      public $end;
      public $rent;
      public $discount;
      public $interaction;
      public $contract;

      protected function rules()
      {
      return [
       'start' => 'required|date',
       'end' => 'required|date|after:start',
       'rent' => 'required',
       'discount' => 'required',
       'interaction' => 'required',
       'contract' => 'required|mimes:pdf,doc,docx, image'
      ];
      }

      public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
      }

      public function submitForm()
      {
        sleep(1);

        $contract_uuid = Str::uuid();

        $validatedData = $this->validate();

        try {
            DB::beginTransaction();

            $validatedData['uuid'] = $contract_uuid;
            $validatedData['tenant_uuid'] = $this->tenant->uuid;
            $validatedData['unit_uuid'] = $this->unit->uuid;
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['contract'] = $this->contract->store('contracts');

            Contract::create($validatedData);

            Unit::where('uuid', $this->unit->uuid)->update([
            'status_id' => 4
            ]);

            $bill_no = Property::find(Session::get('property'))->bills->count();

            if($this->rent > 0){
               Bill::create([
               'bill_no' => Property::find(Session::get('property'))->bills->count()+1,
               'bill' => $this->rent,
               'reference_no' => Carbon::now()->timestamp.''.$bill_no++,
               'start' => $this->start,
               'end' => $this->end,
               'due_date' => Carbon::parse($this->start)->addDays(7),
               'status' => 'unpaid',
               'user_id' => auth()->user()->id,
               'particular_id' => '1',
               'property_uuid' => Session::get('property'),
               'unit_uuid' => $this->unit->uuid,
               'tenant_uuid' => $this->tenant->uuid,
               ]);

               Bill::create([
               'bill_no' => Property::find(Session::get('property'))->bills->count()+1,
               'bill' => $this->rent,
               'reference_no' => Carbon::now()->timestamp.''.$bill_no++,
               'start' => $this->start,
               'end' => $this->end,
               'due_date' => Carbon::parse($this->start)->addDays(7),
               'status' => 'unpaid',
               'user_id' => auth()->user()->id,
               'particular_id' => '2',
               'property_uuid' => Session::get('property'),
               'unit_uuid' => $this->unit->uuid,
               'tenant_uuid' => $this->tenant->uuid,
               ]);
            }

            DB::commit();

             $details =[
             'property' => Session::get('property_name'),
             'tenant' => $this->tenant->tenant,
             'body' => 'Please be informed of the following details of your contract:',
             'start' => Carbon::parse($this->start)->format('M d, Y'),
             'end' => Carbon::parse($this->end)->format('M d, Y'),
             'rent' => $this->rent,
             'unit' => $this->unit->unit,
             ];

             Mail::to($this->tenant->email)->send(new SendContractMailToTenant($details));

            return
            redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$contract_uuid.'/bill/'.Str::random(8).'/create')->with('success','Contract has been created.');

        } catch (\Throwable $e) {
            ddd($e);
            DB::rollback();
            return back()->with('error','Cannot complete your action.');
        }
      }

      public function render()
      {
      return view('livewire.contract-component');
      }
}
