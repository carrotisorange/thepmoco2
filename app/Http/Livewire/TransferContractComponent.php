<?php

namespace App\Http\Livewire;

use App\Mail\SendContractToTenant;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Property;
use Session;
use App\Models\Unit;
use Illuminate\Support\Str;
use App\Models\Contract;
use Illuminate\Support\Facades\Mail;
use DB;
use App\Models\Bill;

class TransferContractComponent extends Component
{
       use WithFileUploads;

       public $contract_details;

        public $selectedUnit = null;
        public $rent = 0.00;
        public $start;
        public $end;

        public $discount= 0;
        public $contract;
        public $term;


        public function updatedSelectedUnit($unit_uuid)
        {
            $this->rent = Unit::find($unit_uuid)->rent;
            $this->discount = Unit::find($unit_uuid)->discount;
            $this->start = Carbon::parse($this->contract_details->start)->format('Y-m-d');
            $this->end = Carbon::parse($this->contract_details->end)->format('Y-m-d');
            $this->term = Carbon::now()->addYear()->diffInDays(Carbon::now());
        }

       protected function rules()
       {
            return [
   
               'start' => 'required|date',
               'end' => 'required|date|after:start',
               'rent' => 'required',
               'discount' => 'required',
               'contract' => 'nullable|mimes:pdf'
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
       $validatedData['tenant_uuid'] = $this->contract_details->tenant_uuid;
       $validatedData['unit_uuid'] = $this->selectedUnit;
       $validatedData['property_uuid'] = Session::get('property');
       $validatedData['user_id'] = auth()->user()->id;
       $validatedData['bill_reference_no'] = $reference_no;

       $validatedData['status'] = 'active';
       $validatedData['interaction'] = 'transferred';

        if($this->contract)
        {
        $validatedData['contract'] = $this->contract->store('contracts');
        }else{
        $validatedData['contract'] = Property::find(Session::get('property'))->tenant_contract;
        }

       Contract::create($validatedData);

       Contract::where('uuid', $this->contract_details->uuid)
       ->update([
            'status' => 'inactive'
       ]);  

       Unit::where('uuid', $this->selectedUnit)->update([
        'status_id' => 4
       ]);

       Bill::where('tenant_uuid', $this->contract_details->tenant_uuid)
       ->where('unit_uuid', $this->contract_details->unit_uuid)
       ->update([
            'unit_uuid' => $this->selectedUnit
       ]);

       $details =[
       'tenant' => $this->contract_details->tenant->tenant,
       'start' => Carbon::parse($this->start)->format('M d, Y'),
       'end' => Carbon::parse($this->end)->format('M d, Y'),
       'rent' => $this->contract_details->rent,
       'unit' => $this->contract_details->unit->unit,
       ];

          Mail::to($this->contract_details->tenant->email)->send(new SendContractToTenant($details));

       DB::commit();

       return
       redirect('/contract/'.$contract_uuid.'/preview/')->with('success','Contract
       has been transferred.');

       } catch (\Throwable $e) {
       ddd($e);
       DB::rollback();
       return back()->with('error','Cannot complete your action.');
       }
       }
    
    public function render()
    {
        return view('livewire.transfer-contract-component', [
            'units' => Property::find(Session::get('property'))->units,
        ]);
    }
}
