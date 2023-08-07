<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;
use App\Models\Contract;
use App\Models\DeedOfSale;

class BillDraftComponent extends Component
{
    public $bills;
    public $batch_no;
    public $property_uuid;
    public $bill_to = '';
    public $isBillSplit = '';

    public function mount($batch_no, $property_uuid){
        $this->bills = $this->getBills();
        $this->batch_no = $batch_no;
        $this->property_uuid = $property_uuid;
    }

    protected function rules()
    {
        return [
            'bills.*.unit_uuid' => 'required',
            'bills.*.start' => 'nullable|date',
            'bills.*.end' => 'nullable|date',
            'bills.*.particular_id' => 'required',
            'bills.*.bill' => 'required'
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }
    
    public function getBills(){
        return Bill::where('property_uuid', $this->property_uuid)->where('batch_no', $this->batch_no)->get();
    }

    public function postBills(){
        
        

        if($this->bill_to == 'tenant'){
            if($this->isBillSplit == 'yes'){
                //to be implemented
            }else{
                foreach($this->bills as $bill){
                if($bill->unit->contracts()->where('status', 'active')->count()){
                    $tenant_uuid = Contract::where('unit_uuid', $bill->unit_uuid)->get()[0]['tenant_uuid'];

                    Bill::where('batch_no', $this->batch_no)
                    ->where('property_uuid', $this->property_uuid)
                    ->where('unit_uuid', $bill->unit_uuid)
                    ->update([
                        'tenant_uuid' => $tenant_uuid,
                        'is_posted' => true
                    ]);
                }else{
                    Bill::where('batch_no', $this->batch_no)
                    ->where('property_uuid', $this->property_uuid)
                    ->where('unit_uuid', $bill->unit_uuid)
                    ->update([
                        'is_posted' => true
                    ]);
                }
            }
        }
        }elseif($this->bill_to == 'owner'){
            foreach($this->bills as $bill){
           if($bill->unit->deed_of_sales()->where('status', 'active')->count()){
           $owner_uuid = DeedOfSale::where('unit_uuid', $bill->unit_uuid)->get()[0]['owner_uuid'];

                    Bill::where('batch_no', $this->batch_no)
                    ->where('property_uuid', $this->property_uuid)
                    ->where('unit_uuid', $bill->unit_uuid)
                    ->update([
                        'owner_uuid' => $owner_uuid,
                        'is_posted' => true
                    ]);
                }else{
                    Bill::where('batch_no', $this->batch_no)
                    ->where('property_uuid', $this->property_uuid)
                    ->where('unit_uuid', $bill->unit_uuid)
                    ->update([
                        'is_posted' => true
                    ]);
                }
            }
        }else{
            Bill::where('batch_no', $this->batch_no)
                    ->where('property_uuid', $this->property_uuid)
                    ->update([
                        'is_posted' => true
            ]);
        }
        
    
        return redirect('/property/'.$this->property_uuid.'/bill')->with('success', 'Success!');
    }

    public function render()
    {
        $this->bills = $this->getBills();

        return view('livewire.bill-draft-component');
    }
}
