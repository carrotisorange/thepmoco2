<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Utility;
use App\Models\Contract;
use App\Models\DeedOfSale;
use App\Models\Booking;
use App\Models\Tenant;
use App\Models\Owner;
use App\Models\Guest;

class EditUtilityComponent extends Component
{
    public Utility $utility;

    public $total_amount_due;
    public $previous_reading;
    public $current_reading;
    public $current_consumption;
    public $kwh;

    public $bill_to;
    public $tenant_uuid;
    public $owner_uuid;
    public $status;
    public $min_charge;

    public function mount($utility){
        $this->total_amount_due = $utility->total_amount_due;
        $this->previous_reading = $utility->previous_reading;
        $this->current_reading = $utility->current_reading;
        $this->current_consumption = $utility->current_consumption;
        $this->kwh =  $utility->kwh;
        $this->status = $utility->status;
        $this->min_charge =  $utility->min_charge;
    }

    public function updatedPreviousReading(){
        (double) $this->current_consumption = ((double) $this->current_reading - (double) $this->previous_reading);
        (double) $this->total_amount_due = ((double) $this->current_consumption * (double) $this->kwh) + (double) $this->min_charge;
    }

    public function updatedCurrentReading(){
        (double) $this->current_consumption = (double) $this->current_reading - (double) $this->previous_reading;
        (double) $this->total_amount_due = ((double) $this->current_consumption * (double) $this->kwh) + (double) $this->min_charge;
    }

    public function updatedKwh(){
        (double) $this->total_amount_due = ((double) $this->current_consumption * (double) $this->kwh) + (double) $this->min_charge;
    }

    public function updatedMinCharge(){
        (double) $this->total_amount_due = ((double) $this->current_consumption * (double) $this->kwh) + (double) $this->min_charge;
    }

    public function updateUtility()
    {
 
        sleep(2);

        $tenant_uuid = Tenant::where('uuid', $this->bill_to)->pluck('uuid')->first();
        $owner_uuid = Owner::where('uuid', $this->bill_to)->pluck('uuid')->first();
        $status = '';

        if($tenant_uuid){
            $tenant_uuid;
            $this->status = 'billed to tenant';
        }

        if($owner_uuid){
            $owner_uuid;
            $this->status = 'billed to owner';
        }

        if($this->utility->type=='electric'){
            $particular_id = 6;
        }else{
            $particular_id = 5;
        }

        Utility::where('id', $this->utility->id)
         ->update([
         'total_amount_due' => $this->total_amount_due,
         'previous_reading' => $this->previous_reading,
         'current_reading' => $this->current_reading,
         'current_consumption' => $this->current_consumption,
         'kwh' => $this->kwh,
         'status' => $this->status,
         'min_charge' => $this->min_charge
        ]);

        app('App\Http\Controllers\BillController')->store($this->utility->property_uuid, $this->utility->unit_uuid, $tenant_uuid, $owner_uuid, $particular_id, $this->utility->start_date, $this->utility->end_date, $this->total_amount_due, $this->utility->batch_no, 1);

        return redirect(url()->previous())->with('success', 'Success!');
    }
    

    public function render()
    {
        return view('livewire.edit-utility-component',[
            'tenants' => Contract::where('unit_uuid', $this->utility->unit_uuid)->where('status', 'active')->get()->unique('tenant_uuid'),
            'owners' => DeedOfSale::where('unit_uuid', $this->utility->unit_uuid)->where('status', 'active')->get()->unique('owner_uuid'),
        ]);
    }
}
