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
    public $isBillSplit = false;
    public $total_amount_due;

    public function mount(){
       $this->total_amount_due = round($this->utility->total_amount_due, 2);
       $this->particular_id=$this->get_particular_id($this->utility->type);
    }
    public function submitForm(){

        

        try{
            if($this->type==='tenant'){
                
                $contracts = Contract::where('unit_uuid', $this->unit->uuid)->where('status', 'active')->get();
                
                foreach($contracts as $contract){

                if($this->isBillSplit === 'yes'){
                    $amount = $this->utility->total_amount_due/$contracts->count();
                }else{
                    $amount = $this->utility->total_amount_due;
                }

                 $tenant = Tenant::find($contract['tenant_uuid']);

                app('App\Http\Controllers\BillController')->store($tenant->property_uuid, $this->unit->uuid, $tenant->uuid, '',$this->particular_id, $this->utility->start_date, $this->utility->end_date, $amount, '', 1);
                
            }
            }else{
                
                $deedofsales = DeedOfSale::where('unit_uuid', $this->unit->uuid)->where('status', 'active')->get();
                
                foreach($deedofsales as $deedofsale){

                if($this->isBillSplit === 'yes'){
                    $amount = $this->utility->total_amount_due/$deedofsales->count();
                }else{
                    $amount = $this->utility->total_amount_due;
                }

                 $owner = Owner::find($deedofsale['owner_uuid']);

                app('App\Http\Controllers\BillController')->store($owner->property_uuid, $this->unit->uuid, '',$owner->uuid, $this->particular_id, $this->utility->start_date, $this->utility->end_date, $amount, '', 1);
                
            }
            }
            

          Utility::where('id', $this->utility->id)
          ->update(
            [
                'status' => 'billed to '. $this->type,
                'total_amount_due' => $this->total_amount_due
            ]
        );

         return redirect('/property/'.$this->property->uuid.'/unit/'.$this->unit->uuid.'/bills')->with('success', 'The bill is successfully posted');
        // return redirect('/property/'.$this->property->uuid.'/unit/'.$this->unit->uuid.'/'.$this->type.'/utility/'.$this->utility->id.'/success')->with('success', 'Success!');

        // return back()->with('success');

        }catch(\Exception $e){
        
            return back()->with('error',$e);
        }

    }

    public function get_particular_id($type){
        if($type === 'electric'){
            return 6;
        }else{
            return 5;
        }
    }
    
    public function render()
    {
        // ddd($this->get_particular_id($this->utility->type));

        return view('livewire.unit-bill-create-component');
    }
}
