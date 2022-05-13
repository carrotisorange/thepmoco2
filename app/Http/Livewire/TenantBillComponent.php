<?php

namespace App\Http\Livewire;
use App\Models\Tenant;
use App\Models\Bill;
use Livewire\WithPagination;
use Livewire\Component;

class TenantBillComponent extends Component
{
     use WithPagination;

    public $tenant;

     public $selectedBills = [];
     public $selectAll = false;  
    
    public function mount($tenant)
    {
        $this->tenant = $tenant;
    }

     public function deleteBills()
     {
        Bill::destroy($this->selectedBills);

        $this->selectedBills = [];

        session()->flash('success', 'Bills Successfully Deleted!');
     }

    public function updatedSelectAll($value)
       {
         if($value)
         {
            $this->selectedBills = Bill::where('tenant_uuid', $this->tenant->uuid)            
            ->pluck('id');
          
         }else
         {
            $this->selectedBills = [];
         }
       }


    public function render()
    {
        return view('livewire.tenant-bill-component',[
            'bills' => Tenant::find($this->tenant->uuid)->bills()->orderBy('bill_no','asc')->paginate(10),
             'total' => Bill::whereIn('id', $this->selectedBills)->sum('bill'),
        ]);
    }
}
