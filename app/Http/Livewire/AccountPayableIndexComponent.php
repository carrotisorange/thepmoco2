<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use Livewire\WithPagination;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;
use Session;
use Carbon\Carbon;

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
        $this->created_at = Carbon::parse(AccountPayable::where('property_uuid', $this->property->uuid)->orderBy('id', 'desc')->pluck('created_at')->first());
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

    public function get_accountpayables(){
      if(Session::get('role_id') === 9){
           return AccountPayable::selectedproperty()
          //  ->selectedrequested()
           ->where('approver_id', auth()->user()->id)
            ->when($this->created_at, function($query){
              $query->whereMonth('created_at', Carbon::parse($this->created_at)->month);
            })
           ->when($this->status, function($query){
             $query->where('status', $this->status);
           })
           ->orderBy('created_at', 'desc')
           ->get();
      }elseif(Session::get('role_id') === 4){
          return AccountPayable::selectedproperty()
            ->when($this->created_at, function($query){
            $query->whereMonth('created_at', Carbon::parse($this->created_at)->month);
            })
           ->when($this->status, function($query){
             $query->where('status', $this->status);
           })
           ->orderBy('created_at', 'desc')
           ->get(); 
      }else{
           return AccountPayable::selectedproperty()
           ->selectedrequested()
             ->when($this->created_at, function($query){
             $query->whereMonth('created_at', Carbon::parse($this->created_at)->month);
             })
           ->when($this->status, function($query){
           $query->where('status', $this->status);
           })
           ->orderBy('created_at', 'desc')
           ->get();
      }

    }
    
    public function render()
    { 
       return view('livewire.account-payable-index-component',[
          'accountpayables' => $this->get_accountpayables(),
          'statuses' => app('App\Http\Controllers\PropertyAccountPayableController')->get_statuses($this->property),
          'dates' => app('App\Http\Controllers\PropertyAccountPayableController')->get_dates($this->property),
          'types' => app('App\Http\Controllers\PropertyAccountPayableController')->get_types($this->property),
          'dates' => AccountPayable::where('property_uuid', $this->property->uuid)
         ->groupByRaw('MONTHNAME(created_at)')
          ->get(),
        ]);
    }
}
