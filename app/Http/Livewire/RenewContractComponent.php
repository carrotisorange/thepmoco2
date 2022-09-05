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
        public $sendContract;


       public function mount($contract_details)
       {
            $this->contract_details = $contract_details;
            $this->start = Carbon::parse($this->contract_details->start)->format('Y-m-d');
            $this->end = Carbon::parse($this->contract_details->start)->addYear()->format('Y-m-d');
            $this->rent = $contract_details->rent;
            $this->discount = $contract_details->discount;
           $this->term = Carbon::now()->addYear()->diffInMonths(Carbon::now()).' months';
           $this->sendContract = false;

       }


        public function hydrateTerm()
        {
           $this->term = Carbon::parse($this->end)->diffInMonths(Carbon::parse($this->start)).' months';
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

      $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no($this->contract_details->property_uuid);

       $reference_no = Carbon::now()->timestamp.''.$bill_no;

       $validatedData['uuid'] = $contract_uuid;
       $validatedData['tenant_uuid'] = $this->contract_details->tenant_uuid;
       $validatedData['unit_uuid'] = $this->contract_details->unit_uuid;
       $validatedData['property_uuid'] = $this->contract_details->property_uuid;
       $validatedData['user_id'] = auth()->user()->id;
       $validatedData['bill_reference_no'] = $reference_no;
       $validatedData['interaction_id'] = '8';

      if(auth()->user()->role_id == '8'){
          $validatedData['status'] = 'pendingrenew';
       }
       else{
          $validatedData['status'] = 'active';
       }

       if($this->contract)
       {
          $validatedData['contract'] = $this->contract->store('contracts');
       }else{
          //$validatedData['contract'] = Property::find(Session::get('property'))->tenant_contract;
       }

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
       'unit' => $this->contract_details->unit_uuid,
       ];

         if($this->sendContract)
         {
            Mail::to($this->contract_details->tenant->email)->send(new SendContractToTenant($details));
         }

       DB::commit();

       if(auth()->user()->role_id == '8'){
          return redirect('/8/tenant/'.auth()->user()->username.'/contracts/')->with('success', 'Contract renewal has been requested.');
       }else{
          redirect('/property/'.$this->contract_details->property_uuid.'/tenant/'.$this->contract_details->tenant_uuid.'/contracts')->with('success','Contract
          is successfully renewed.');
       }


       
       } catch (\Throwable $e) {
       DB::rollback();
  
       return back()->with('error','Cannot complete your action.');
       }
       }
    
    public function render()
    {
        return view('livewire.renew-contract-component');
    }
}
