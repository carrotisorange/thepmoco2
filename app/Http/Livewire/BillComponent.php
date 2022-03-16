<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use App\Models\Bill;
use Illuminate\Support\Str;
use DB;
use Session;
use App\Models\Property;

use Livewire\Component;

class BillComponent extends Component
{
      public $unit;
      public $tenant;
      public $contract;
      public $particulars;
      public $bills;

      public function mount($unit, $tenant, $contract, $particulars, $bills)
      {
      $this->unit = $unit;
      $this->tenant = $tenant;
      $this->contract = $contract;
      $this->particulars = $particulars;
      $this->bills = $bills;
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

      try {
        $validatedData['tenant_uuid'] = $this->tenant->uuid;
        $validatedData['unit_uuid'] = $this->unit->uuid;
        $validatedData['property_uuid'] = Session::get('property');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['bill_no'] = Property::find(Session::get('property'))->bills->count()+1;

        Bill::create($validatedData);
        DB::commit();
        $this->resetForm();
        return
        redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$this->contract->uuid.'/bill/'.Str::random(8).'/create')->with('success',
        'Bill has been created.');
        } catch (\Throwable $e) {
        DB::rollback();
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
      return view('livewire.bill-component');
      }
}
