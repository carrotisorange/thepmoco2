<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tenant;
use Session;

class TenantIndexComponent extends Component
{
    public $search = null;

    public function render()
    {
        return view('livewire.tenant-index-component', [
            'tenants' => Tenant::search($this->search)
            ->where('property_uuid', Session::get('property'))
            ->orderBy('created_at', 'asc')
            ->simplePaginate(5),
        ]);
    }
}
