<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tenant;
use Session;
use Livewire\WithPagination;

class TenantIndexComponent extends Component
{
    use WithPagination;

    public $search = null;
    public $status;

    public function render()
    {
        $statuses =  Tenant::where('property_uuid', Session::get('property'))
        ->select('status')
        ->whereNotNull('status')
        ->groupBy('status')
        ->get();

        $tenants = Tenant::search($this->search)
        ->where('property_uuid', Session::get('property'))
        ->when($this->status, function($query){
          $query->where('status',$this->status);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        
        return view('livewire.tenant-index-component', [
            'tenants' => $tenants,
            'statuses' => $statuses
        ]);
    }
}
