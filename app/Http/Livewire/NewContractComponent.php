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

class NewContractComponent extends Component
{
       use WithFileUploads;

       public $tenant;

        public $unit_uuid;
        public $rent;
        public $start;
        public $end;

        public $discount;
        public $contract;
        public $term;

         public function mount($tenant)
         {
            $this->tenant = $tenant;
            $this->start = Carbon::now()->format('Y-m-d');
            $this->end = Carbon::now()->addYear()->format('Y-m-d');
            $this->term = Carbon::now()->addYear()->diffInMonths(Carbon::now()).' months';
         }

         public function hydrateTerm()
         {
            $this->term = Carbon::parse($this->end)->diffInMonths(Carbon::parse($this->start)).' months';
         }

        public function updatedUnitUuid($unit_uuid)
        {
            $this->rent = Unit::find($unit_uuid)->rent;
            $this->discount = Unit::find($unit_uuid)->discount;
        }

       protected function rules()
       {
            return [
            'unit_uuid' => 'required',
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

   $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no(Session::get('property'));

       $reference_no = Carbon::now()->timestamp.''.$bill_no;

       $validatedData['uuid'] = $contract_uuid;
       $validatedData['tenant_uuid'] = $this->tenant->uuid;
       $validatedData['unit_uuid'] = $this->unit_uuid;
       $validatedData['property_uuid'] = Session::get('property');
       $validatedData['user_id'] = auth()->user()->id;
       $validatedData['bill_reference_no'] = $reference_no;
       $validatedData['status'] = 'active';
       $validatedData['interaction'] = 'in-house';

       if($this->contract)
       {
       $validatedData['contract'] = $this->contract->store('contracts');
       }else{
       $validatedData['contract'] = Property::find(Session::get('property'))->tenant_contract;
       }

       Contract::create($validatedData);

       Unit::where('uuid', $this->unit_uuid)->update([
        'status_id' => 4
       ]);

       $details =[
       'tenant' => $this->tenant->tenant,
       'start' => Carbon::parse($this->start)->format('M d, Y'),
       'end' => Carbon::parse($this->end)->format('M d, Y'),
       'rent' => $this->rent,
       'unit' => $this->unit_uuid,
       ];

       Mail::to($this->tenant->email)->send(new SendContractToTenant($details));

       DB::commit();

       return
        redirect('/tenant/'.$this->tenant->uuid)->with('success','Contract
        // has been transfered.');
    //    redirect('/tenant/'.$this->tenant->uuid.'/contract/'.$contract_uuid.'/bills/')->with('success','Contract
    //    has been transfered.');

       } catch (\Throwable $e) {
       ddd($e);
       DB::rollback();
       return back()->with('error','Cannot complete your action.');
       }
       }
    
    public function render()
    {
        return view('livewire.new-contract-component', [
            'units' => Property::find(Session::get('property'))->units,
        ]);
    }
}
