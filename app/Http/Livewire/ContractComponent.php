<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use DB;
use Livewire\WithFileUploads;

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
          'contract' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
        ];
      }

      public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
      }

      public function makeReservation()
      {
         Contract::create([
          'uuid' => app('App\Http\Controllers\PropertyController')->generate_uuid(),
          'property_uuid' => Session::get('property'),
          'start' => $this->start,
          'end' => $this->end,
          'interaction_id' => $this->interaction_id,
          'rent' => $this->rent,
          'tenant_uuid' => $this->tenant->uuid,
          'unit_uuid' => $this->unit->uuid,
          'status' => 'reserved'
         ]);

          //update status of the selected unit
          app('App\Http\Controllers\UnitController')->update_unit_status($this->unit->uuid, 4);

          //update status of the tenant
          app('App\Http\Controllers\TenantController')->update_tenant_status($this->tenant->uuid, 'reserved');

         return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant->uuid)
                  ->with('success', 'Tenant is marked as reserved.');
      }

      public function submitForm()
      {
        sleep(1);

        //validate inputs
        $validatedData = $this->validate();

        try {
           DB::transaction(function () use ($validatedData){
            $contract_uuid = app('App\Http\Controllers\PropertyController')->generate_uuid();

            //store new contract
            $this->store_contract($validatedData, $contract_uuid);

            //store new referral
            if($this->referral)
            {
              app('App\Http\Controllers\ReferralController')->store($this->referral, $contract_uuid,  Session::get('property'));
            }

          //update status of the selected unit
          app('App\Http\Controllers\UnitController')->update_unit_status($this->unit->uuid, 4);

          //update status of the tenant
          app('App\Http\Controllers\TenantController')->update_tenant_status($this->tenant->uuid, 'active');

          //store new point
          app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id,5, 1);
                  
          if($this->sendContractToTenant)
          {
            app('App\Http\Controllers\TenantController')->send_mail_to_tenant($this->tenant->email, $this->tenant->tenant,Carbon::parse($this->start)->format('M
            d, Y'),Carbon::parse($this->end)->format('M d, Y'), $this->rent, $this->unit->unit);
          }
        
          if(auth()->user()->role_id === 1)
          {
            return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant->uuid.'/contracts/')->with('success','Contract is successfully created.');

          }else{
            return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant->uuid.'/bill/'.$this->unit->uuid.'/create')->with('success', 'Contract is successfully created.');
            }
          });
            
        }catch (\Exception $e) {
          session()->flash('error');
        }
      }

      public function removeContract()
      {
         $this->contract = '';
      }

      public function store_contract($validatedData, $contract_uuid)
      {
         $validatedData['uuid'] = $contract_uuid;
         $validatedData['tenant_uuid'] = $this->tenant->uuid;
         $validatedData['unit_uuid'] = $this->unit->uuid;
         $validatedData['property_uuid'] = Session::get('property');
         $validatedData['user_id'] = auth()->user()->id;

         if($this->contract)
         {
          $validatedData['contract'] = $this->contract->store('contracts');
         }else
         {
          $validatedData['contract'] = Property::find(Session::get('property'))->tenant_contract;
         }

         return Contract::create($validatedData);
       
      }

      public function render()
      {
        return view('livewire.contract-component',[
          'interactions' => Interaction::whereNotIn('id', ['8','9'])->get()
        ]);
      }
}
