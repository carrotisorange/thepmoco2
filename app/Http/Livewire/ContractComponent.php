<?php

namespace App\Http\Livewire;

use App\Mail\SendContractToTenant;
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
use App\Models\Point;
use App\Models\Referral;

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
        $this->term = Carbon::now()->addYear()->diffInDays(Carbon::now());
      }

      public $start;
      public $end;
      public $rent;
      public $discount;
      public $interaction;
      public $contract;
      public $referral;

      protected function rules()
      {
      return [
       'start' => 'required|date',
       'end' => 'required|date|after:start',
       'rent' => 'required',
       'discount' => 'required',
       'interaction' => 'required',
       'contract' => 'nullable|mimes:pdf,doc,docx, image'
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

            $bill_no = Property::find(Session::get('property'))->bills->count()+1;

            $reference_no = Carbon::now()->timestamp.''.$bill_no;

            $validatedData['uuid'] = $contract_uuid;
            $validatedData['tenant_uuid'] = $this->tenant->uuid;
            $validatedData['unit_uuid'] = $this->unit->uuid;
            $validatedData['property_uuid'] = Session::get('property');
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['bill_reference_no'] = $reference_no;

             if($this->contract)
             {
                $validatedData['contract'] = $this->contract->store('contracts');
             }else{
                 $validatedData['contract'] = Property::find(Session::get('property'))->tenant_contract;
             }

            Contract::create($validatedData);

             if($this->referral)
             {
                 Referral::create([
                 'referral' => $this->referral,
                 'contract_uuid' => $contract_uuid,
                 'property_uuid' => Session::get('property')
                 ]);
             }
             

            Unit::where('uuid', $this->unit->uuid)->update([
            'status_id' => 2
            ]);

            if($this->rent > 0){
               Bill::create([
               'bill_no' => $bill_no++,
               'bill' => $this->rent,
               'reference_no' => $reference_no,
               'start' => $this->start,
               'end' => Carbon::parse($this->start)->addMonth(),
               'due_date' => Carbon::parse($this->start)->addDays(7),
               'status' => 'unpaid',
               'user_id' => auth()->user()->id,
               'particular_id' => '1',
               'property_uuid' => Session::get('property'),
               'unit_uuid' => $this->unit->uuid,
               'tenant_uuid' => $this->tenant->uuid,
               'due_date' => Carbon::parse($this->start)->addDay(),
               ]);

               Bill::create([
               'bill_no' => $bill_no++,
               'bill' => $this->rent,
               'reference_no' => $reference_no,
               'start' => Carbon::parse($this->start)->addMonth(),
               'end' => Carbon::parse($this->start)->addMonths(2),
               'due_date' => Carbon::parse($this->start)->addDays(7),
               'status' => 'unpaid',
               'user_id' => auth()->user()->id,
               'particular_id' => '2',
               'property_uuid' => Session::get('property'),
               'unit_uuid' => $this->unit->uuid,
               'tenant_uuid' => $this->tenant->uuid,
               'due_date' => Carbon::parse($this->start)->addDay(),
               ]);

                Bill::create([
                'bill_no' => $bill_no++,
                'bill' => $this->rent,
                'reference_no' => $reference_no,
                  'start' => $this->start,
                  'end' => $this->end,
                'due_date' => Carbon::parse($this->start)->addDays(7),
                'status' => 'unpaid',
                'user_id' => auth()->user()->id,
                'particular_id' => '3',
                'property_uuid' => Session::get('property'),
                'unit_uuid' => $this->unit->uuid,
                'tenant_uuid' => $this->tenant->uuid,
                'due_date' => Carbon::parse($this->start)->addDay(),
                ]);

                Bill::create([
                'bill_no' => $bill_no++,
                'bill' => $this->rent,
                'reference_no' => $reference_no,
                'start' => $this->start,
                'end' => $this->end,
                'due_date' => Carbon::parse($this->start)->addDays(7),
                'status' => 'unpaid',
                'user_id' => auth()->user()->id,
                'particular_id' => '4',
                'property_uuid' => Session::get('property'),
                'unit_uuid' => $this->unit->uuid,
                'tenant_uuid' => $this->tenant->uuid,
                'due_date' => Carbon::parse($this->start)->addDay(),
                ]);

            }

             if($this->discount > 0){
              Bill::create([
              'bill_no' => $bill_no++,
              'bill' => -($this->discount),
              'reference_no' => $reference_no,
              'start' => $this->start,
              'end' => Carbon::parse($this->start)->addMonth(),
              'due_date' => Carbon::parse($this->start)->addDays(7),
              'status' => 'unpaid',
              'user_id' => auth()->user()->id,
              'particular_id' => '8',
              'property_uuid' => Session::get('property'),
              'unit_uuid' => $this->unit->uuid,
              'tenant_uuid' => $this->tenant->uuid,
              'due_date' => Carbon::parse($this->start)->addDay(),
              ]);
             }

            Point::create([
            'user_id' => auth()->user()->id,
            'point' => 5,
            'action_id' => 1,
            'property_uuid' => Session::get('property')
          ]);

             $details =[
             'tenant' => $this->tenant->tenant,
             'start' => Carbon::parse($this->start)->format('M d, Y'),
             'end' => Carbon::parse($this->end)->format('M d, Y'),
             'rent' => $this->rent,
             'unit' => $this->unit->unit,
             ];

           Mail::to($this->tenant->email)->send(new SendContractToTenant($details));

            DB::commit();
        
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
