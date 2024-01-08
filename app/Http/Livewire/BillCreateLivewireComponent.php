<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\{PropertyParticular, DeedOfSale, Booking};
use Illuminate\Support\Facades\Session;

class BillCreateLivewireComponent extends Component
{

    public $type;
    public $uuid;

    public $particular_id;
    public $unit_uuid;
    public $start;
    public $end;
    public $bill;


    protected function rules()
    {
      return [
         'particular_id' => ['required', Rule::exists('particulars', 'id')],
         'start' => 'required|date',
         'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
         'end' => 'nullable|date|after:start',
         'bill' => 'required|numeric|min:1',
      ];
    }

    public function submit(){

        $this->validate();

        app('App\Http\Controllers\Features\BillController')->storeTenantBill(
            $this->particular_id,
            $this->bill,
            $this->unit_uuid,
            $this->start,
            $this->end,
            $this->type,
            $this->uuid
        );

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function getPropertyParticulars(){
       return PropertyParticular::where('property_uuid', Session::get('property_uuid'))->get();
    }


    public function getUnits(){

        $units = null;

        if($this->type=='tenant'){
            $units = app('App\Http\Controllers\TenantContractController')->show_tenant_contracts($this->uuid);
        }elseif($this->type=='owner'){
            $units = DeedOfSale::where('owner_uuid', $this->uuid)->get();
        }else{
            $units = Booking::where('guest_uuid', $this->uuid)->groupBy('unit_uuid')->get();
        }

        return $units;

    }


    public function render()
    {

        $particulars = $this->getPropertyParticulars();

        $units = $this->getUnits();

        return view('livewire.bill-create-livewire-component', compact('particulars', 'units'));
    }
}
