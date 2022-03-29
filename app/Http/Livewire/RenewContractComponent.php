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

class RenewContractComponent extends Component
{
       use WithFileUploads;

       public $contract_details;
        public $rent = 0.00;
        public $start;
        public $end;

        public $discount= 0;
        public $contract;
        public $term;


       public function mount($contract_details)
       {
            $this->contract_details = $contract_details;
            $this->start = Carbon::parse($this->contract_details->start)->format('Y-m-d');
            $this->end = Carbon::parse($this->contract_details->start)->addYear()->format('Y-m-d');
            $this->rent = $contract_details->rent;
            $this->discount = $contract_details->discount;
       }

       protected function rules()
       {
            return [
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'rent' => 'required',
            'discount' => 'required',
            'contract' => 'required|mimes:pdf'
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
       $validatedData['unit_uuid'] = $this->contract_details->unit_uuid;
       $validatedData['property_uuid'] = Session::get('property');
       $validatedData['user_id'] = auth()->user()->id;
       $validatedData['bill_reference_no'] = $reference_no;
       $validatedData['contract'] = $this->contract->store('contracts');
       $validatedData['status'] = 'active';
       $validatedData['interaction'] = 'renewed';

       Contract::create($validatedData);

       Contract::where('uuid', $this->contract_details->uuid)
       ->update([
            'status' => 'inactive'
       ]);  

       Unit::where('uuid', $this->contract_details->unit_uuid)->update([
        'status_id' => 4
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
       has been transfered.');

       } catch (\Throwable $e) {
       ddd($e);
       DB::rollback();
       return back()->with('error','Cannot complete your action.');
       }
       }
    
    public function render()
    {
        return view('livewire.renew-contract-component');
    }
}
