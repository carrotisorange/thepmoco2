<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\{Tenant,Owner,Guest,Bill, Property};



class BillReferenceIndexLivewireComponent extends Component
{
    public $type;
    public $uuid;

    public $billStatus;
    public $billParticularId;
    public $billUnitUuid;

    public $selectedBills = [];

    public function updatedSelectAll($value)
    {
      if($value)
      {
         $this->selectedBills = Bill::where($this->type.'_uuid', $this->uuid)
            ->when($this->status, function($query){
            $query->where('status', $this->billStatus);
         })->pluck('id');
      }else
      {
         $this->selectedBills = [];
      }
    }

    public function getBills(){

        $bills = $this->getBillTo();

        return $bills->bills()
        ->posted()
        ->when($this->billStatus, function($query){
        $query->where('status', $this->billStatus);
        })
        ->when($this->billParticularId, function($query){
        $query->where('particular_id', $this->billParticularId);
        })
        ->when($this->billUnitUuid, function($query){
        $query->where('unit_uuid', $this->billUnitUuid);
        })
        ->orderBy('bill_no','desc')
        ->get();

    }

    public function getBillTo(){
        $billTo = null;

        if($this->type == 'tenant'){
            $billTo = Tenant::find($this->uuid);
        }elseif($this->type == 'owner'){
            $billTo = Owner::find($this->uuid);
        }else{
            $billTo = Guest::find($this->uuid);
        }
        return $billTo;
    }

    public function getBillToName(){
        $billToName = null;

        if($this->type == 'tenant'){
            $billToName = Tenant::find($this->uuid)->tenant;
        }elseif($this->type == 'owner'){
            $billToName = Owner::find($this->uuid)->owner;
        }else{
            $billToName = Guest::find($this->uuid)->guest;
        }
        return $billToName;

    }

    public function getBillParticulars(){
        return Bill::select('*')->join('particulars', 'bills.particular_id', 'particulars.id')->where($this->type.'_uuid', $this->uuid)->groupBy('particular_id')->posted()->get();
    }

    public function submit()
    {

    $ar_no = Property::find(Session::get('property_uuid'))->acknowledgementreceipts->max('ar_no')+1;

    $batch_no = Carbon::now()->timestamp.''.$ar_no;

    for($i=0; $i<count($this->selectedBills); $i++){
        app('App\Http\Controllers\Features\CollectionController')->storeCollection(
            $this->selectedBills[$i],
            $this->type,
            $this->uuid,
            $batch_no,
            $ar_no,
            $this->getBillTo()
        );
    }

      return redirect('/property/'.Session::get('property_uuid').'/collection/'.$this->type.'/'.$this->getBillTo()->uuid.'/'.$batch_no.'/pay');

    }

    public function render()
    {

        $bills = $this->getBills();

        $billParticulars = $this->getBillParticulars();

        $billTo = $this->getBillToName();

        $total = $this->getBills()->where('status', 'unpaid')->whereIn('id', $this->selectedBills)->sum('bill') - $this->getBills()->where('status', 'paid')->whereIn('id', $this->selectedBills)->sum('bill');

        $email = $this->getBillTo()->email;

        return view('livewire.bill-reference-index-livewire-component',compact('bills', 'billParticulars', 'billTo', 'total', 'email'));
    }
}
