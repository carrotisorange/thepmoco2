<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Bill;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;
use App\Models\Particular;

class BillCreateComponent extends Component
{
    public $tenant;
    public $unit;

    public $particular_id;
    public $start;
    public $end;
    public $bill;
    public $unit_uuid;

    public $property_uuid;

    public function mount($unit)
    {
        $this->unit_uuid = $unit->uuid;
        $this->end = Carbon::now()->addYear()->format('Y-m-d');
        $this->start = Carbon::now()->format('Y-m-d');
        $this->property_uuid = Session::get('property');
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

         app('App\Http\Controllers\BillController')->store($this->property_uuid, $this->unit->uuid, $this->tenant->uuid,'', $this->particular_id, $this->start, $this->end, $this->bill, '', 1);

        if($this->particular_id === '3' || $this->particular_id === '4'){
            app('App\Http\Controllers\WalletController')->store($this->tenant->uuid, '', $this->bill, Particular::find($this->particular_id)->particular);
        }
         
        $this->reset_form();

         return session()->flash('success', 'Bill is successfully posted.');

       }catch(\Exception $e)
       {
         return session()->flash('error');
       }

    }

    public function reset_form()
    {
        $this->particular_id = '';
        $this->bill = '';
    }

    public function render()
    {
        return view('livewire.bill-create-component',[
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property')),
            'units' => app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($this->tenant->uuid),
            'bills' => app('App\Http\Controllers\TenantBillController')->show_tenant_bills($this->tenant->uuid),
        ]);
    }
}
