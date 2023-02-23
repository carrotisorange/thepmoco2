<?php

namespace App\Http\Livewire;

use App\Mail\SendContractToTenant;
use App\Mail\sendContractToTenantToTenant;
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

    public $unit_uuid;
    public $rent;
    public $start;
    public $end;

    public $discount;
    public $contract;
    public $term;
    public $sendContractToTenant;

    public function mount()
    {
      $this->start = Carbon::now()->format('Y-m-d');
      $this->end = Carbon::now()->addYear()->format('Y-m-d');
      $this->term = Carbon::now()->addYear()->diffInMonths(Carbon::now()).' months';
      $this->sendContractToTenant = false;
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
                'contract' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            ];
    }

    public function updated($propertyName)
    {
    $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
      sleep(1);
     
      $validatedData = $this->validate();

      try {
      
        DB::transaction(function () use ($validatedData){
                    
        $this->store_contract($validatedData);

        $this->update_current_contract($this->contract_details->uuid);

        $this->update_unit($this->unit_uuid);

        $this->update_bills();

        $this->send_email_to_tenant();

        return redirect('/property/'.Session::get('property').'/tenant/'.$this->contract_details->tenant_uuid.'/contracts')->with('success','Contract has been transferred.');
      
      });

      }catch (\Exception $e) {
        return back()->with('error','Cannot complete your action.');
      }
    }

    public function store_contract($validatedData)
    {
        $contract_uuid = Str::uuid();

        $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no(Session::get('property'));
        
        $reference_no = Carbon::now()->timestamp.''.$bill_no;

        $validatedData['uuid'] = $contract_uuid;
        $validatedData['tenant_uuid'] = $this->contract_details->tenant_uuid;
        $validatedData['unit_uuid'] = $this->unit_uuid;
        $validatedData['property_uuid'] = Session::get('property');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['bill_reference_no'] = $reference_no;

        $validatedData['status'] = 'active';
        $validatedData['interaction_id'] = '9';

        if($this->contract)
        {
        $validatedData['contract'] = $this->contract->store('contracts');
        }else{
        $validatedData['contract'] = Property::find(Session::get('property'))->tenant_contract;
        }

        return Contract::create($validatedData);
    }

    public function update_current_contract($contract_uuid)
    {
        Contract::where('uuid', $contract_uuid)
        ->update([
        'status' => 'inactive'
        ]);
    }

    public function update_unit($unit_uuid)
    {
      Unit::where('uuid', $unit_uuid)->update([
      'status_id' => 4
      ]);
    }

    public function send_email_to_tenant()
    {
      $details =[
       'tenant' => $this->contract_details->tenant->tenant,
       'start' => Carbon::parse($this->start)->format('M d, Y'),
       'end' => Carbon::parse($this->end)->format('M d, Y'),
       'rent' => $this->contract_details->rent,
       'unit' => Unit::find($this->unit_uuid)->unit,
       ];

      if($this->sendContractToTenant)
      {
        Mail::to($this->contract_details->tenant->email)->send(new SendContractToTenant($details));
      }
    }

    public function update_bills()
    {
        Bill::where('tenant_uuid', $this->contract_details->tenant_uuid)
        ->where('unit_uuid', $this->contract_details->unit_uuid)
        ->update([
        'unit_uuid' => $this->unit_uuid
        ]);
    }

    public function render()
    {
        return view('livewire.transfer-contract-component', [
            'units' => Property::find(Session::get('property'))->units,
        ]);
    }
}
