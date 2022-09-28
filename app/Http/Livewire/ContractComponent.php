<?php

namespace App\Http\Livewire;

use App\Mail\SendContractToTenant;
use App\Models\Contract;
use App\Models\Unit;
use DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Property;
use Carbon\Carbon;
use Session;
use App\Models\Interaction;

class ContractComponent extends Component
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
      public $sendContractToTenant;

      public function mount($unit, $tenant)
      {
        $this->unit = $unit;
        $this->tenant = $tenant;
        $this->rent = $unit->rent;
        $this->discount = $unit->discount;
        // $this->end = Carbon::now()->addYear()->format('Y-m-d');
        $this->start = Carbon::now()->format('Y-m-d');
        $this->term = Carbon::now()->addYear()->diffInDays(Carbon::now());
        $this->sendContractToTenant = false;
      }

      protected function rules()
      {
        return [
        'start' => 'required|date',
        'end' => 'required|date|after:start',
        'rent' => 'required',
        'discount' => 'required',
        'interaction_id' => 'nullable',
        'contract' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:1024',
        ];
      }

      public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
      }

      public function submitForm()
      {
        sleep(1);

        //validate inputs
        $validated_data = $this->validate();

        try {
            DB::beginTransaction();

            $contract_uuid = app('App\Http\Controllers\PropertyController')->generate_uuid();

            //store new contract
            $this->store_contract($validated_data, $contract_uuid);

            //store new referral
            if($this->referral)
            {
              app('App\Http\Controllers\ReferralController')->store($this->referral, $contract_uuid,  Session::get('property'));
            }

            //update status of the selected unit
            $this->update_unit(4);

            //store new point
            app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id,5, 1);
                  
            $this->send_mail_to_tenant();

            if(auth()->user()->role_id === 1)
            {
                return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant->uuid.'/contracts/')->with('success','Contract is successfully created.');

            }else{
                  return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant->uuid.'/bill/'.
                  $this->unit->uuid.'/create')
                  ->with('success', 'Contract is successfully created.');
            }

            DB::commit();

            //$this->store_bill();
            
        }catch (\Exception $e) {

          DB::rollback();

          ddd($e);
   
          return back()->with('error','Cannot complete your action.');
        }
      }

      public function store_contract($validated_data, $contract_uuid)
      {
         $validated_data['uuid'] = $contract_uuid;
         $validated_data['tenant_uuid'] = $this->tenant->uuid;
         $validated_data['unit_uuid'] = $this->unit->uuid;
         $validated_data['property_uuid'] = Session::get('property');
         $validated_data['user_id'] = auth()->user()->id;

         if($this->contract)
         {
          $validated_data['contract'] = $this->contract->store('contracts');
         }else
         {
          $validated_data['contract'] = Property::find(Session::get('property'))->tenant_contract;
         }

         return Contract::create($validated_data);
       
      }

      public function update_unit($status_id)
      {
        Unit::where('uuid', $this->unit->uuid)
        ->update([
           'status_id' => $status_id
        ]);
      }

      public function send_mail_to_tenant()
      {
        $details =[
          'tenant' => $this->tenant->tenant,
          'start' => Carbon::parse($this->start)->format('M d, Y'),
          'end' => Carbon::parse($this->end)->format('M d, Y'),
          'rent' => $this->rent,
          'unit' => $this->unit->unit,
        ];

        if($this->sendContractToTenant)
        {
          Mail::to($this->tenant->email)->send(new SendContractToTenant($details));
        }
      }

      public function render()
      {
        return view('livewire.contract-component',[
          'interactions' => Interaction::whereNotIn('id', ['8','9'])->get()
        ]);
      }
}
