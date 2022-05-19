<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use App\Models\Tenant;
use App\Models\Bill;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Collection;
use Barryvdh\DomPDF\Facade\PDF;

class TenantBillComponent extends Component
{
     use WithPagination;

    public $tenant;

     public $selectedBills = [];
     public $status;
     public $selectAll = false;  
    
    public function mount($tenant)
    {
        $this->tenant = $tenant;
    }

     public function removeBills()
     {
        Bill::destroy($this->selectedBills);

        $this->selectedBills = [];

          return redirect('/tenant/'.$this->tenant->uuid.'/bills')->with('success','Bills Successfully removed.');
     }

     public function postBills()
     {
         try{
            
            sleep(1);

            DB::beginTransaction();
            
            DB::commit();

         }catch(\Exception $e)
         { 
            ddd($e);
            return back()->with('error','Cannot perform your action.');
         }
     }

     public function exportBills()
     {
         return redirect('/tenant/'.$this->tenant->uuid.'/bill/export')->with('success','Bills successfully marked as unpaid.');
     }

     public function unpayBills()
     {
         Bill::whereIn('id', $this->selectedBills)
         ->update([
            'status' => 'unpaid'
         ]);

         $collection_batch_no = Collection::where('bill_id', $this->selectedBills[0])->pluck('batch_no');

         AcknowledgementReceipt::where('collection_batch_no', $collection_batch_no)->delete();

         Collection::whereIn('bill_id', $this->selectedBills)
           ->delete();

          $this->selectedBills = [];

          return redirect('/tenant/'.$this->tenant->uuid.'/bills')->with('success','Bills successfully marked as unpaid.');
        
     }

    public function updatedSelectAll($value)
       {
         if($value)
         {
            $this->selectedBills = Bill::where('tenant_uuid', $this->tenant->uuid)
             ->when($this->status, function($query){
             $query->where('status', $this->status);
             })
            ->pluck('id');
         }else
         {
            $this->selectedBills = [];
         }
       }


    public function render()
    {

       $bills = Tenant::find($this->tenant->uuid)
       ->bills()
       ->orderBy('bill_no','asc')
       ->when($this->status, function($query){
       $query->where('status', $this->status);
       })
       ->get();

       $total = Bill::whereIn('id', $this->selectedBills)
       ->where('status', 'unpaid')
       ->sum('bill');

         $total_count = Bill::whereIn('id', $this->selectedBills)
         ->where('status', 'paid')
         ->count();

        return view('livewire.tenant-bill-component',[
            'bills' => $bills,
            'total' => $total,
            'total_count' => $total_count,
            'total_paid_bills' => $bills->where('status', 'paid')->sum('bill'),
            'total_unpaid_bills' => $bills->where('status', 'unpaid'),
        ]);
    }
}
