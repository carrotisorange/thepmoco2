<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\{Unit,Bill};

class CreateBulkBillComponent extends Component
{
    public $start;
    public $end;
    public $particular_id;
    public $bill;
    public $recipient;

    public $activeTenantContracts;
    public $activeOwnersDeedOfSales;

    public function mount(){
        $this->activeTenantContracts = app('App\Http\Controllers\Features\ContractController')->get('active');
        $this->activeOwnersDeedOfSales = app('App\Http\Controllers\Features\OwnerController')->get('active');
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

    public function updated($propertyName)
    {
      $this->validateOnly($propertyName);
    }

    public function redirectToUnitsPage(){
      return redirect('/property/'.Session::get('property_uuid').'/unit/');
    }

    public function storeBills(){
      $this->validate([
        'recipient' => 'required'
      ]);

      $validatedInputs = $this->validate();

      $billNo = app('App\Http\Controllers\Features\BillController')->getLatestBillNo();
      $billBatchNo = app('App\Http\Controllers\Features\BillController')->generateBillBatchNo($billNo);

      try{
        if($this->recipient == 'tenant'){
            foreach($this->activeTenantContracts as $item){
                  if($this->particular_id == '8'){ //check if particular is discount and convert it to negative
                    $validatedInputs['bill'] = -($this->bill);
                  }elseif($this->particular_id == '1'){
                    $validatedInputs['bill'] = $item->unit->rent?$item->unit->rent:0;
                  }else{
                    $validatedInputs['bill'] = $this->bill;
                  }
                  $validatedInputs['unit_uuid']= $item->unit_uuid;
                  $validatedInputs['tenant_uuid'] = $item->tenant_uuid;
                  $validatedInputs['bill_no'] = $billNo++;
                  $validatedInputs['user_id'] = auth()->user()->id;
                  $validatedInputs['due_date'] = Carbon::parse($this->start)->addDays(7);
                  $validatedInputs['property_uuid'] = Session::get('property_uuid');
                  $validatedInputs['batch_no'] = $billBatchNo;
                  $validatedInputs['status'] = 'unpaid';
                  $validatedInputs['created_at'] = Carbon::now();
                  $validatedInputs['is_posted'] = 0;

                  Bill::create($validatedInputs);
                }
        }else{
            for($i=0; $i<$this->activeOwnersDeedOfSales->count(); $i++){
                $ownerUuid = $this->activeOwnersDeedOfSales->pluck('owner_uuid')[$i];
                $unitUuid = $this->activeOwnersDeedOfSales->pluck('unit_uuid')[$i];
                $rent = Unit::where('uuid',$unitUuid)->value('rent');

                if($this->particular_id == '8'){ //check if particular is discount and convert it to negative
                        $validatedInputs['bill'] = -($this->bill);
                }elseif($this->particular_id == '1'){
                        $validatedInputs['bill'] = $rent?$rent:0;
                }else{
                        $validatedInputs['bill'] = $this->bill;
                }
                    $validatedInputs['unit_uuid']= $unitUuid;
                    $validatedInputs['owner_uuid'] = $ownerUuid;
                    $validatedInputs['bill_no'] = $billNo++;
                    $validatedInputs['user_id'] = auth()->user()->id;
                    $validatedInputs['due_date'] = Carbon::parse($this->start)->addDays(7);
                    $validatedInputs['property_uuid'] = Session::get('property_uuid');
                    $validatedInputs['batch_no'] = $billBatchNo;
                    $validatedInputs['status'] = 'unpaid';
                    $validatedInputs['created_at'] = Carbon::now();
                    $validatedInputs['is_posted'] = 1;

                    Bill::create($validatedInputs);
            }
        }

            return redirect('/property/'.Session::get('property_uuid').'/bill/'.'customized'.'/'.$billBatchNo)->with('success', 'Changes Saved!');

            // return redirect('/property/'.Session::get('property_uuid').'/bill/')->with('success', 'Changes Saved!');

        }catch(\Exception $e)
        {
            return redirect(url()->previous())->with('error', $e);
        }
   }
    public function render()
    {
        $particulars = app('App\Http\Controllers\Utilities\PropertyParticularController')->index();

        return view('livewire.create-bulk-bill-component',compact(
            'particulars'
        ));
    }
}
