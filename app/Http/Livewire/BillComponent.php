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
use App\Models\Tenant;

use Livewire\Component;

class BillComponent extends Component
{
      public $unit;
      public $tenant;
      public $contract;
      public $bills;

      public $particular_id;
      public $bill;
      public $start;
      public $end;

    public function mount($unit, $tenant, $contract, $bills)
    {
      $this->unit = $unit;
      $this->tenant = $tenant;
      $this->contract = $contract;
      $this->bills = $bills;
      $this->end = Carbon::now()->addYear()->format('Y-m-d');
      $this->start = Carbon::now()->format('Y-m-d');
    }
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


      $validated_data = $this->validate();

      $bill_no = app('App\Http\Controllers\BillController')->getLatestBillNo(Session::get('property_uuid')->uuid);

      try
      {
        $this->store_bill($validated_data, $bill_no);

        DB::commit();

        $this->resetForm();

        return redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$this->contract->uuid.'/bill/'.Str::random(8).'/create')->with('success', 'Changes Saved!');
      }
      catch (\Exception $e) {
        DB::rollback();
        return redirect('/unit/'.$this->unit->uuid.'/tenant/'.$this->tenant->uuid.'/contract/'.$this->contract->uuid.'/bill/'.Str::random(8).'/create')->with('error', 'Cannot perform the action. Please try again.');
      }
    }

    public function resetForm()
    {
      $this->particular_id='';
      $this->bill='';
      $this->start='';
      $this->end='';
    }

    public function store_bill($validated_data, $bill_no)
    {
      $validated_data['reference_no'] = Tenant::find($this->tenant->uuid)->bill_reference_no;
      $validated_data['tenant_uuid'] = $this->tenant->uuid;
      $validated_data['unit_uuid'] = $this->unit->uuid;
      $validated_data['property_uuid'] = Session::get('property_uuid');
      $validated_data['user_id'] = auth()->user()->id;
      $validated_data['bill_no'] = $bill_no+1;
      $validated_data['due_date'] = Carbon::now()->addDays(7);
      $validated_data['description'] = 'movein charges';

      Bill::create($validated_data);
    }

    public function render()
    {
      $contract = Contract::find($this->contract->uuid);

      $particulars = Particular::join('property_particulars', 'particulars.id','property_particulars.particular_id')
      ->where('property_uuid', Session::get('property_uuid'))
      ->get();

      return view('livewire.bill-component',[
        'particulars' => $particulars,
        'contract' => $contract
      ]);
    }
}
