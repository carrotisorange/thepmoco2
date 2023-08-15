<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use DB;
use Session;
use Str;

class ContractMoveinComponent extends Component
{
    use WithFileUploads;

    public $contract_details;

    //list of input fields
    public $start;
    public $end;
    public $rent;
    public $discount;
    public $interaction_id = 11;
    public $contract;
    public $referral;
    public $sendContractToTenant;

    public function mount($contract_details)
      {
        $this->rent = $contract_details->unit->rent;
        $this->tenant = $contract_details->tenant->tenant;
        $this->discount = $contract_details->unit->discount;
        $this->start = Carbon::now()->format('Y-m-d');
        $this->term = Carbon::now()->addYear()->diffInDays(Carbon::now());
        $this->sendContractToTenant = true;
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

    public function submitForm()
    {
        

        //validate inputs
        $validatedData = $this->validate();

        try {
           DB::transaction(function () use ($validatedData){

            $validatedData['status'] = 'pendingmovein';
             
            $this->contract_details->update($validatedData);

            //store new referral
            if($this->referral)
            {
              app('App\Http\Controllers\ReferralController')->update($this->referral, $this->contract_details->uuid,  Session::get('property'));
            }

            //update status of the tenant
            app('App\Http\Controllers\TenantController')->update_tenant_status($this->contract_details->tenant->uuid,'active');

            //store new point
            app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id,4, 1);
                  
            if($this->sendContractToTenant)
            {
                app('App\Http\Controllers\TenantController')->send_mail_to_tenant($this->contract_details->tenant->email, $this->contract_details->tenant->tenant,Carbon::parse($this->start)->format('M d, Y'),Carbon::parse($this->end)->format('M d, Y'), $this->rent, $this->contract_details->unit->unit);
            }

            if(auth()->user()->role_id === 1)
            {
                return
                redirect('/property/'.Session::get('property').'/tenant/'.$this->contract_details->tenant->uuid.'/contracts/')->with('success','Success!');

            }else{
                  return redirect('/property/'.Session::get('property').'/unit/'.$this->contract_details->unit->uuid.'/tenant/'.$this->contract_details->tenant->uuid.'/bill/'.Str::random(8).'/create')
                  ->with('success', 'Success!');
            }
          });
            
        }catch (\Exception $e) {
          session()->flash('error', 'Something went wrong.');
        }
    }

    public function removeContract()
    {
        $this->contract = '';
    }

    public function render()
    {
        return view('livewire.contract-movein-component',[
            'unit' => Unit::find($this->contract_details->unit->uuid),
            'interactions' => app('App\Http\Controllers\InteractionController')->index(),
        ]);
    }
}
