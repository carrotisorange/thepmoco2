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
      public $rent;
      public $start;
      public $end;
      public $unit;

      public $discount;
      public $contract;
      public $term;
      public $sendContractToTenant = false;


      public function mount($contract_details)
      {
         $this->start = Carbon::parse($this->contract_details->start)->format('Y-m-d');
         $this->rent = $contract_details->rent;
         $this->unit  = $contract_details->unit->unit;
         $this->discount = $contract_details->discount;
         $this->term = Carbon::now()->addYear()->diffInMonths(Carbon::now()).' months';
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
            'contract' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
         ];
      }

      public function updated($propertyName)
      {
         $this->validateOnly($propertyName);
      }

      public function submitForm()
      {
         

         $validatedData = $this->validate();

         try {
            DB::transaction(function () use ($validatedData){
               
               $this->store_contract($validatedData);

               $this->update_current_contract($this->contract_details->uuid);

               $this->update_unit($this->contract_details->unit_uuid);

               // $this->send_mail_to_tenant();

            });

         // if(auth()->user()->role_id == '8'){
         //    return redirect('/8/tenant/'.auth()->user()->username.'/contracts/')->with('success', 'Contract renewal has been requested.');
         // }else{
            redirect('/property/'.$this->contract_details->property_uuid.'/tenant/'.$this->contract_details->tenant_uuid.'/contracts')->with('success','Success!');
         // }
         
         } catch (\Throwable $e) {
            ddd($e);
            return back()->with('error','Cannot complete your action.');
         }
   }

   public function update_unit($unit_uuid)
   {
      Unit::where('uuid', $unit_uuid)->update([
         'status_id' => 4
      ]);
   }

   public function send_mail_to_tenant()
   {
      $details =[
      'tenant' => $this->contract_details->tenant->tenant,
      'start' => Carbon::parse($this->start)->format('M d, Y'),
      'end' => Carbon::parse($this->end)->format('M d, Y'),
      'rent' => $this->contract_details->rent,
      'unit' => $this->contract_details->unit_uuid,
      ];

      if($this->sendContractToTenant)
      {
         Mail::to($this->contract_details->tenant->email)->send(new SendContractToTenant($details));
      }
   }

   public function update_current_contract($contract_uuid)
   {
        Contract::where('uuid', $contract_uuid)
         ->update([
         'status' => 'inactive'
        ]);
   }
   public function store_contract($validatedData)
   {
         $contract_uuid = Str::uuid();

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
            //$validatedData['contract'] = Property::find(Session::get('property_uuid'))->tenant_contract;
         }

         Contract::create($validatedData);

      }
    
    public function render()
    {
        return view('livewire.renew-contract-component');
    }
}
