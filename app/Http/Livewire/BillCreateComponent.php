<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Bill;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;

class BillCreateComponent extends Component
{
    public $tenant;
    public $unit;

    public $particular_id;
    public $start;
    public $end;
    public $bill;
    public $unit_uuid;

    public function mount($unit)
    {
        $this->unit_uuid = $unit->uuid;
        $this->end = Carbon::now()->addYear()->format('Y-m-d');
        $this->start = Carbon::now()->format('Y-m-d');
    }

    protected function rules()
    {
        return [
            'particular_id' => ['required', Rule::exists('particulars', 'id')],
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'bill' => 'required',
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function removeBill($bill_id)
    {
        Bill::where('id', $bill_id)->delete();

        return session()->flash('success', 'Bill is successfully removed.');
    }


    public function submitForm()
    {
        sleep(1);

         $validated_data = $this->validate();    

       try{

            $this->store_bill($validated_data);

       }catch(\Exception $e)
       {
            session()->flash('error');
       }

       $this->reset_form();
        
        return session()->flash('success', 'Bill is successfully posted.');

    }

    public function reset_form()
    {
        $this->particular_id = '';
        $this->bill = '';
    }

    public function store_bill($validated_data)
    {
        $validated_data['property_uuid'] = Session::get('property');
        $validated_data['unit_uuid'] = $this->unit->uuid;
        $validated_data['tenant_uuid'] = $this->tenant->uuid;
        $validated_data['bill_no'] = app('App\Http\Controllers\BillController')->get_latest_bill_no(Session::get('property'));
        $validated_data['due_date'] = Carbon::now()->addDay();

        return Bill::create($validated_data);
    }

    public function render()
    {
        return view('livewire.bill-create-component',[
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->show(Session::get('property')),
            'units' => app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($this->tenant->uuid),
            'bills' => app('App\Http\Controllers\TenantBillController')->show_tenant_bills($this->tenant->uuid),
        ]);
    }
}
