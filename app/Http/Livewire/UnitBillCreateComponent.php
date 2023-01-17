<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Contract;
use App\Models\DeedOfSale;
use App\Models\Tenant;
use App\Models\Utility;
use App\Models\Owner;

class UnitBillCreateComponent extends Component
{
    public $property;
    public $unit;
    public $type;
    public $utility;

    public $particular_id;
    public $start;
    public $end;
    public $bill;
    public $unit_uuid;

    public function submitForm(){
        
        sleep(1);

     

        try{
            if($this->type==='tenant'){
                
                $contracts = Contract::where('unit_uuid', $this->unit->uuid)->where('status', 'active')->get();
                
                foreach($contracts as $contract){

                $tenant = Tenant::find($contract['tenant_uuid']);

                app('App\Http\Controllers\BillController')->store($tenant->property_uuid, $this->unit->uuid, $tenant->uuid, '',6, $this->utility->start_date, $this->utility->end_date, $this->utility->total_amount_due/$contracts->count(), '', 1);
                
            }
            }else{
                
                $deedofsales = DeedOfSale::where('unit_uuid', $this->unit->uuid)->where('status', 'active')->get();
                
                foreach($deedofsales as $deedofsale){

                $owner = Owner::find($deedofsale['owner_uuid']);

                app('App\Http\Controllers\BillController')->store($owner->property_uuid, $this->unit->uuid, '',$owner->uuid, 6, $this->utility->start_date, $this->utility->end_date, $this->utility->total_amount_due/$deedofsales->count(), '', 1);
                
            }
            }
            

          Utility::where('id', $this->utility->id)
          ->update(
            ['status' => 'billed to '. $this->type
          ]);

        return redirect('/property/'.$this->property->uuid.'/unit/'.$this->unit->uuid.'/bills')->with('success', 'The bill is successfully posted');

        }catch(\Exception $e){
            ddd($e);
        }

    }
    
    public function render()
    {
        return view('livewire.unit-bill-create-component');
    }
}
