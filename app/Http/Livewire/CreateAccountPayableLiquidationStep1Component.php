<?php

namespace App\Http\Livewire;

use App\Models\AccountPayableLiquidation;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\AccountPayable;
use App\Models\Property;
use App\Models\AccountPayableLiquidationParticular;
use App\Models\Role;

class CreateAccountPayableLiquidationStep1Component extends Component
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
    public $return_type;
    public $total_type;
    public $total_amount;
    public $noted_by;
    public $approved_by;
    public $prepared_by;
    public $batch_no;

    public function mount($accountpayable){
        $this->created_at = Carbon::parse(AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('created_at')->first())->format('Y-m-d');
        $this->batch_no = $accountpayable->batch_no;
        $this->particulars = $this->get_particulars();
        $this->prepared_by = auth()->user()->id;
        $this->name = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('name')->first();
        $this->department = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('department')->first();
        $this->unit_uuid = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('unit_uuid')->first();
        $this->total = AccountPayableLiquidationParticular::where('batch_no', $accountpayable->batch_no)->sum('total');
        $this->cash_advance = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('cash_advance')->first();
        $this->cv_number = sprintf('%08d', AccountPayable::where('property_uuid',$this->property->uuid)->where('status', '!=', 'pending')->count());
        $this->total_type = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('total_type')->first();
        $this->total_amount = (double) $this->total- (double) $this->cash_advance;
        $this->return_type =  AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('return_type')->first();
        $this->noted_by = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('noted_by')->first();
        $this->approved_by = AccountPayableLiquidation::where('batch_no', $accountpayable->batch_no)->pluck('approved_by')->first();
    }

    public function dehydrate(){
        $this->total_amount = (double) $this->total- (double) $this->cash_advance;
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
            'cash_advance' => 'nullable',
            'total_type' => 'nullable',
            'prepared_by' => 'nullable',
            'return_type' => ['nullable'],
            'total_amount' => ['nullable'],
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }

    public function storeAccountPayableLiquidation(){
        

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
                'total_amount' => $this->total-$this->cash_advance,
                'cash_advance' => $this->cash_advance,
                'prepared_by' => $this->prepared_by,
                'noted_by' => $this->noted_by,
                'approved_by' => $this->approved_by,
                'return_type' => $this->return_type,
                'cv_number' => sprintf('%08d', AccountPayable::where('property_uuid',$this->property->uuid)->where('status','!=', 'pending')->count())
        ]);

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/liquidation/step-2')->with('success', 'Success!');
    }

    public function updateParticular(){
        try{
             foreach ($this->particulars as $particular) {
                $particular->update([
                    'item' => $particular->item,
                    'quantity' => $particular->quantity,
                    'unit_uuid' => $this->unit_uuid,
                    'vendor_id' => $particular->vendor_id,
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

    public function removeParticular($id){
        
        AccountPayableLiquidationParticular::where('id', $id)->delete();

        $this->particulars = $this->get_particulars();

        return back()->with('success', 'Success!');
    }

    public function get_particulars(){
        return AccountPayableLiquidationParticular::where('batch_no', $this->accountpayable->batch_no)->get();
    }

    public function storeNewItem(){
        // 

        AccountPayableLiquidationParticular::create(
        [
         'batch_no' => $this->accountpayable->batch_no,
         'created_at' => Carbon::now(),
         'unit_uuid' => '',
         'vendor_id' => '',
         'item' => '',
         'quantity' => '',
         'price' => '',
         'total' => ''
        ]);

        $this->particulars = $this->get_particulars();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.create-account-payable-liquidation-step1-component',[
            'units' => Property::find($this->property->uuid)->units,
            'vendors' => Property::find($this->property->uuid)->billers,
            'departments' => Role::whereNotIn('id', [5, 7, 8, 10, 12, 13])->get(),
            'accountpayableliquidation' => AccountPayableLiquidation::where('batch_no', $this->accountpayable->batch_no)->pluck('cv_number')->first()
        ]);
    }
}
