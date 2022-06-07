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
use App\Models\Interaction;
use App\Models\Referral;

class ContractComponent extends Component
{
     use WithFileUploads;

      public $unit;
      public $tenant;

      public $start;
      public $end;
      public $rent;
      public $discount;
      public $interaction_id;
      public $contract;
      public $referral;
      public $sendContract;

      public function mount($unit, $tenant)
      {
        $this->unit = $unit;
        $this->tenant = $tenant;
        $this->rent = $unit->rent;
        $this->discount = $unit->discount;
  
        $this->start = Carbon::now()->format('Y-m-d');
        $this->end = Carbon::parse($this->start)->addYear()->format('Y-m-d');
        $this->term = Carbon::now()->addYear()->diffInDays(Carbon::now());
        $this->sendContract = true;
      }

      protected function rules()
      {
      return [
       'start' => 'required|date',
       'end' => 'required|date|after:start',
       'rent' => 'required',
       'discount' => 'required',
       'interaction_id' => 'required',
       'contract' => 'nullable|mimes:pdf,doc,docx, image',
      ];
      }

      public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
      }

      public function hydrateTerm()
      {
        $this->term = Carbon::parse($this->end)->diffInMonths(Carbon::parse($this->start)).' months';
      }


      public function submitForm()
      {
        sleep(1);

        $contract_uuid = Str::uuid();

        $validatedData = $this->validate();

        try {
            DB::beginTransaction();

            $bill_no = Property::find(Session::get('property'))->bills->max('bill_no')+1;

            $validatedData['uuid'] = $contract_uuid;
            $validatedData['tenant_uuid'] = $this->tenant->uuid;
            $validatedData['unit_uuid'] = $this->unit->uuid;
            $validatedData['property_uuid'] = Session::get('property');
            $validatedData['user_id'] = auth()->user()->id;


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
              'status_id' => 4
            ]);

            if($this->rent > 0){
               Bill::create([
                'bill_no' => $bill_no++,
                'bill' => $this->rent,
                'reference_no' => $this->tenant->bill_reference_no,
                'start' => $this->start,
                'end' => Carbon::parse($this->start)->addMonth(),
                'due_date' => Carbon::parse($this->start)->addDays(7),
                'description' => 'movein charges',
                'user_id' => auth()->user()->id,
                'particular_id' => '1',
                'property_uuid' => Session::get('property'),
                'unit_uuid' => $this->unit->uuid,
                'tenant_uuid' => $this->tenant->uuid,
            
               ]);

               Bill::create([
                'bill_no' => $bill_no++,
                'bill' => $this->rent,
                'reference_no' => $this->tenant->bill_reference_no,
                'start' => Carbon::parse($this->start)->addMonth(),
                'end' => Carbon::parse($this->start)->addMonths(2),
                'due_date' => Carbon::parse($this->start)->addDays(7),
                'description' => 'movein charges',
                'user_id' => auth()->user()->id,
                'particular_id' => '2',
                'property_uuid' => Session::get('property'),
                'unit_uuid' => $this->unit->uuid,
                'tenant_uuid' => $this->tenant->uuid,
             
               ]);

                Bill::create([
                  'bill_no' => $bill_no++,
                  'bill' => $this->rent,
                  'reference_no' => $this->tenant->bill_reference_no,
                  'start' => $this->start,
                  'end' => $this->end,
                  'due_date' => Carbon::parse($this->start)->addDays(7),
                  'description' => 'movein charges',
                  'user_id' => auth()->user()->id,
                  'particular_id' => '3',
                  'property_uuid' => Session::get('property'),
                  'unit_uuid' => $this->unit->uuid,
                  'tenant_uuid' => $this->tenant->uuid,
                ]);

                Bill::create([
                'bill_no' => $bill_no++,
                'bill' => $this->rent,
                'reference_no' => $this->tenant->bill_reference_no,
                'start' => $this->start,
                'end' => $this->end,
                'due_date' => Carbon::parse($this->start)->addDays(7),
                'description' => 'movein charges',
                'user_id' => auth()->user()->id,
                'particular_id' => '4',
                'property_uuid' => Session::get('property'),
                'unit_uuid' => $this->unit->uuid,
                'tenant_uuid' => $this->tenant->uuid,
           
                ]);

            }

             if($this->discount > 0){
              Bill::create([
              'bill_no' => $bill_no++,
              'bill' => -($this->discount),
              'reference_no' => $this->tenant->bill_reference_no,
              'start' => $this->start,
              'end' => Carbon::parse($this->start)->addMonth(),
              'due_date' => Carbon::parse($this->start)->addDays(7),
              'description' => 'movein charges',
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

             if($this->sendContract)
             {
                Mail::to($this->tenant->email)->send(new SendContractToTenant($details));
             }
          
            DB::commit();
        

             if(auth()->user()->role_id === 1)
             {
               return redirect('/tenant/'.$this->tenant->uuid.'/contracts/')->with('success','Contract is successfully created.');

             }else{
              return redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$contract_uuid.'/bill/'.Str::random(8).'/create')->with('success','Contract
              is successfully created.');
             }
            
        } catch (\Throwable $e) {
            ddd($e);
            DB::rollback();
            return back()->with('error','Cannot complete your action.');
        }
      }

      public function render()
      {
      return view('livewire.contract-component',[
        'interactions' => Interaction::whereNotIn('id', ['8','9'])->get()
      ]);
      }
}
