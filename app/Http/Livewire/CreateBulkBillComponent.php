<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\{Tenant,Unit,Bill};

class CreateBulkBillComponent extends Component
{
    public $start;
    public $end;
    public $particular_id;
    public $bill;

    public $activeContracts;

    public function mount(){
        $this->activeContracts = app('App\Http\Controllers\Features\ContractController')->get('active');
        $this->bill = 0;
        $this->start = Carbon::now()->format('Y-m-d');
        $this->end = Carbon::now()->addMonth()->format('Y-m-d');
    }

    protected function rules()
    {
      return [
          'particular_id' => ['required', Rule::exists('particulars', 'id')],
          'start' => 'required|date',
          'end' => 'required|date|after:start',
          'bill' => 'nullable|numeric'
      ];
    }

    public function storeBills(){
      $validatedInputs = $this->validate();
      $billNo = app('App\Http\Controllers\Features\BillController')->getLatestBillNo();
      $billBatchNo = app('App\Http\Controllers\Features\BillController')->generateBillBatchNo($billNo);
      try{
         for($i=0; $i<$this->activeContracts->count(); $i++){
            $tenantUuid = $this->activeContracts->pluck('tenant_uuid')[$i];
            $unitUuid = $this->activeContracts->pluck('unit_uuid')[$i];
            $rent = Unit::where('uuid',$unitUuid)->value('rent');
               if($this->particular_id == '8'){ //check if particular is discount and convert it to negative
                    $validatedInputs['bill'] = -($this->bill);
               }elseif($this->particular_id == '1'){
                    $validatedInputs['bill'] = $rent?$rent:0;
               }else{
                    $validatedInputs['bill'] = $this->bill;
               }
                $validatedInputs['unit_uuid']= $unitUuid;
                $validatedInputs['tenant_uuid'] = $tenantUuid;
                $validatedInputs['bill_no'] = $billNo++;
                // $validatedInputs['reference_no'] = $referenceNo->bill_reference_no;
                $validatedInputs['user_id'] = auth()->user()->id;
                $validatedInputs['due_date'] = Carbon::parse($this->start)->addDays(7);
                $validatedInputs['property_uuid'] = Session::get('property_uuid');
                $validatedInputs['batch_no'] = $billBatchNo;
                $validatedInputs['status'] = 'unpaid';
                $validatedInputs['created_at'] = Carbon::now();

                Bill::create($validatedInputs);
                }
                return redirect('/property/'.Session::get('property_uuid').'/bill/'.'customized'.'/'.$billBatchNo)->with('success', 'Changes Saved!');

            }catch(\Exception $e)
            {ddd($e);
                return redirect(url()->previous())->with('error', $e);
            }
   }
    public function render()
    {
        $particulars = app('App\Http\Controllers\Utilities\PropertyParticularController')->index(Session::get('property_uuid'));

        return view('livewire.create-bulk-bill-component',compact(
            'particulars'
        ));
    }
}
