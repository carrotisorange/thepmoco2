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
    public $limitDisplayTo;
    public $search;

    public $totalAccountPayableCount;

    use WithPagination;

    public function mount(){
        $this->totalAccountPayableCount = Property::find($this->property->uuid)->accountpayables->count();
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
          'accountpayables' => app('App\Http\Controllers\PropertyAccountPayableController')->get_accountpayables($this->property->uuid, $this->status, $this->created_at, $this->request_for, $this->limitDisplayTo, $this->search),
          'statuses' => app('App\Http\Controllers\PropertyAccountPayableController')->get_statuses($this->property),
          'dates' => app('App\Http\Controllers\PropertyAccountPayableController')->get_dates($this->property),
          'types' => app('App\Http\Controllers\PropertyAccountPayableController')->get_types($this->property),
        ]);
    }
}
