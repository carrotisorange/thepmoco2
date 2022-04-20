<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use App\Models\Bill;
use Illuminate\Support\Str;
use DB;
use Session;
use App\Models\Property;
use App\Models\Particular;
use App\Models\Contract;
use Carbon\Carbon;

use Livewire\Component;

class BillComponent extends Component
{
      public $unit;
      public $tenant;
      public $contract;
      public $bills;

      public function mount($unit, $tenant, $contract, $bills)
      {
        $this->unit = $unit;
        $this->tenant = $tenant;
        $this->contract = $contract;
        $this->bills = $bills;
        $this->end = Carbon::now()->addYear()->format('Y-m-d');
        $this->start = Carbon::now()->format('Y-m-d');
      }

      public $particular_id;
      public $bill;
      public $start;
      public $end;

    protected function rules()
    {
        return [
            'particular_id' => ['required', Rule::exists('particulars', 'id')],
            'bill' =>'required|integer|min:1',
            'start' => 'required|date',
            'end' => 'required|date|after:start'
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

      $bill_no = Property::find(Session::get('property'))->bills->max('bill_no');

      try {
        $validatedData['reference_no'] = Contract::find($this->contract->uuid)->bill_reference_no;
        $validatedData['tenant_uuid'] = $this->tenant->uuid;
        $validatedData['unit_uuid'] = $this->unit->uuid;
        $validatedData['property_uuid'] = Session::get('property');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['bill_no'] = $bill_no+1;
        $validatedData['due_date'] = Carbon::now()->addDays(7);

        Bill::create($validatedData);
        DB::commit();
        $this->resetForm();
        return
        redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$this->contract->uuid.'/bill/'.Str::random(8).'/create')->with('success',
        'Bill has been created.');
        } catch (\Throwable $e) {
        DB::rollback();
        ddd($e);
         return
         redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$this->contract->uuid.'/bill/'.Str::random(8).'/create')->with('success',
         'Cannot perform the action. Please try again.');
      }
     
      }

      public function resetForm()
      {
      $this->particular_id='';
      $this->bill='';
      $this->start='';
      $this->end='';
      }

      public function render()
      {

        $contract = Contract::find($this->contract->uuid);

        $particulars = Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', Session::get('property'))
        ->get();
        
      return view('livewire.bill-component',[
        'particulars' => $particulars,
        'contract' => $contract
      ]);
      }
}
