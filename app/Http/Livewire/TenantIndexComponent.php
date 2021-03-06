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

    public function render()
    {
        $tenants = Tenant::search($this->search)
        ->where('property_uuid', Session::get('property'))
        ->orderBy('created_at', 'asc')
        ->paginate(10);
        
        return view('livewire.tenant-index-component', [
            'tenants' => $tenants
        ]);
    }
}
