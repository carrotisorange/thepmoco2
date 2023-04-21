<?php

namespace App\Http\Livewire;

use App\Models\AccountPayableLiquidation;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\AccountPayableParticular;
use App\Models\Property;
use App\Models\AccountPayableLiquidationParticular;
use Database\Factories\AccountPayableLiquidationFactory;

class CreateAccountPayableLiquidation extends Component
{
    public $property;
    public $accountpayable;
    public $particulars;

    public $name;
    public $created_at;
    public $department;
    public $unit_uuid;
    public $total;
    public $cash_advance;
    public $cv_number;
    public $total_type;
    public $total_amount;
    public $noted_by;
    public $approved_by;
    public $prepared_by;
    public $batch_no;

    public function mount($accountpayable){
        $this->created_at = Carbon::parse(AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('created_at')->first())->format('Y-m-d');
        $this->batch_no = $accountpayable->batch_no;
        $this->particulars = AccountPayableLiquidationParticular::where('batch_no', $this->accountpayable->batch_no)->get();
        $this->prepared_by = auth()->user()->id;

        $this->name = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('name')->first();
        $this->department = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('department')->first();
        $this->unit_uuid = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('unit_uuid')->first();
        $this->total = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('total');
        $this->cash_advance = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('cash_advance')->first();
        $this->cv_number = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('cv_number')->first();
        $this->total_type = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('total_type')->first();
        $this->total_amount = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('total_amount')->first();
        $this->noted_by = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('noted_by')->first();
        $this->approved_by = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('approved_by')->first();
    }

    protected function rules()
    {
        return [
            'particulars.*.item' => 'nullable',
            'particulars.*.quantity' => 'nullable',
            'particulars.*.price' => 'nullable',
            'particulars.*.batch_no' => 'nullable',
            'particulars.*.unit_uuid' => 'nullable',
            'particulars.*.vendor_id' => 'nullable',
            'particulars.*.or_number' => 'nullable',
            'name' => 'required',
            'department' => 'required',
            'created_at' => 'required',
            'unit_uuid' => 'nullable',
            'batch_no' => 'required',
            'total' => 'required',
            'cv_number' => 'nullable',
            'cash_advance' => 'required',
            'total_type' => 'nullable',
            'total_amount' => 'nullable',
            'prepared_by' => 'nullable',
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }


    public function storeAccountPayableLiquidation(){
        sleep(2);

        $this->validate();

        AccountPayableLiquidation::updateOrCreate(
            [
                'batch_no' => $this->batch_no
            ],

            [
                'name' => $this->name,
                'department' => $this->department,
                'created_at' => $this->created_at,
                'unit_uuid' => $this->unit_uuid,
                'batch_no' => $this->batch_no,
                'total' => $this->total,
                'cv_number' => $this->cv_number,
                'total_type' => $this->total_type,
                'total_amount' => $this->total_amount,
                'cash_advance' => $this->cash_advance,
                'prepared_by' => $this->prepared_by,
                'noted_by' => $this->noted_by,
                'approved_by' => $this->approved_by
        ]);

        return back()->with('success', 'Success!');
    }

    public function updateParticular($id){
        try{
            foreach ($this->particulars->where('id', $id) as $particular) {
                AccountPayableLiquidationParticular::where('batch_no', $this->batch_no)
                ->where('id', $id)
                ->update([
                    'item' => $particular->item,
                    'quantity' => $particular->quantity,
                    'price' => $particular->price,
                    'or_number' => $particular->or_number,
                    'total' => $particular->quantity * $particular->price,
                ]);

            session()->flash('success', 'Success!');
            }
            
       }catch(\Exception $e){
            session()->flash('error', $e);
       }
    }



    public function render()
    {
        return view('livewire.create-account-payable-liquidation',[
            'units' => Property::find($this->property->uuid)->units,
        ]);
    }
}
