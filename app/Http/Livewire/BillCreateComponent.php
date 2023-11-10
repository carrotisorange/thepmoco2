<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Bill;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;
use App\Models\Particular;
use App\Models\UserProperty;

class BillCreateComponent extends Component
{
    public $tenant;
    public $unit;

    public $particular_id;
    public $start;
    public $end;
    public $bill;
    public $unit_uuid;

    public $contract;

    public $view = 'listView';

    public $isPaymentAllowed = false;

    public $isIndividualView = true;

    public $tenant_uuid;

    public $user_type = 'tenant';

    public function mount($unit, $tenant)
    {
        $this->unit_uuid = $unit->uuid;
        $this->end = Carbon::now()->addYear()->format('Y-m-d');
        $this->start = Carbon::now()->format('Y-m-d');
        $this->tenant_uuid = $tenant->uuid;
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

        return session()->flash('success', 'Changes Saved!');
    }


    public function submitForm()
    {


         $validated_data = $this->validate();

       try{

         app('App\Http\Controllers\Features\BillController')->store(Session::get('property_uuid'), $this->unit->uuid, $this->tenant->uuid,'', $this->particular_id, $this->start, $this->end, $this->bill, '', 1);

        if($this->particular_id === '3' || $this->particular_id === '4'){
            app('App\Http\Controllers\WalletController')->store($this->tenant->uuid, '', $this->bill, Particular::find($this->particular_id)->particular);
        }

        $this->reset_form();

        return redirect(url()->previous())->with('success', 'Changes Saved!');

       }catch(\Exception $e)
       {
         return redirect(url()->previous())->with('error', $e);
       }

    }

    public function reset_form()
    {
        $this->particular_id = '';
        $this->bill = '';
    }

    public function redirectToContractShowPage(){

        $propertyPersonnelsCount = UserProperty::where('property_uuid', Session::get('property_uuid'))->where('role_id','!=', 5)->count();

        if($propertyPersonnelsCount == 0){
             return redirect('/property/'.Session::get('property_uuid').'/personnel');
        }else{
             return redirect('/property/'.Session::get('property_uuid').'/unit/'.$this->unit->uuid);
        }


    }

    public function render()
    {
        return view('livewire.bill-create-component',[

            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property_uuid')),
            'units' => app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($this->tenant->uuid),
            'bills' => app('App\Http\Controllers\Features\BillController')->show_tenant_bills($this->tenant->uuid),
        ]);
    }
}
