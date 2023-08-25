<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;

class AccountPayableIndexComponent extends Component
{
    public $property;

    public $status;
    public $created_at;
    public $request_for;
    public $limitDisplayTo = 10;
    public $search;

    public $totalAccountPayableCount;

    use WithPagination;

    public function mount(){
        $this->totalAccountPayableCount = Property::find($this->property->uuid)->accountpayables->count();
        $this->status = 'pending';
    }

    public function clearFilters(){
      $this->status = null;
      $this->created_at = null;
      $this->request_for = null;
      $this->limitDisplayTo = null;
    }

    public function exportAccountPayables(){
       return redirect('/property/'.$this->property->uuid.'/accountpayable/export/'.$this->status.'/'.$this->created_at.'/'.$this->request_for.'/'.$this->limitDisplayTo);
    }
    
    public function render()
    {


        return view('livewire.account-payable-index-component',[
          // 'accountpayables' => app('App\Http\Controllers\PropertyAccountPayableController')->get_accountpayables($this->property->uuid, $this->status, $this->created_at, $this->request_for, $this->limitDisplayTo, $this->search),
          'accountpayables' => AccountPayable::where('property_uuid',$this->property->uuid)
             ->when($this->status, function($query){
              $query->where('status', $this->status);
             })
            // ->where('requester_id', auth()->user()->id)
            // ->orWhere('approver_id', auth()->user()->id)
            // ->orWhere('approver2_id', auth()->user()->id)
          // ->when(($this->created_at), function($query){
          // $query->whereDate('created_at', $this->created_at);
          // })
          // ->when($this->request_for, function ($query) {
          // $query->where('request_for', $this->request_for);
          // })
          // ->when($this->search, function ($query) {
          // $query->where('batch_no','like', '%'.$this->search.'%');
          // })
          ->orderBy('created_at', 'asc')
        
          ->get(),

          'statuses' => app('App\Http\Controllers\PropertyAccountPayableController')->get_statuses($this->property),
          'dates' => app('App\Http\Controllers\PropertyAccountPayableController')->get_dates($this->property),
          'types' => app('App\Http\Controllers\PropertyAccountPayableController')->get_types($this->property),
        ]);
    }
}
