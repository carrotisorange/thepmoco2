<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Livewire\WithPagination;
use App\Models\{Type,Tenant};

class TenantIndexComponent extends Component
{
    use WithPagination;

    public $search;
    public $status;
    public $category;

    public $action = 'addNewTenant';

    public function redirectToUnitSelectionPage(){
        return redirect('/property/'.Session::get('property_uuid').'/unit/');
    }

    public function render()
    {
        $statuses = app('App\Http\Controllers\Features\TenantController')->get('','status');

        $categories = app('App\Http\Controllers\Features\TenantController')->get('','category');

        $tenants = Tenant::search($this->search)
        ->where('property_uuid', Session::get('property_uuid'))
        ->when($this->status, function($query){
            $query->where('status',$this->status);
         })
         ->when($this->category, function($query){
            $query->where('category',$this->category);
         })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $propertyTenantsCount = app('App\Http\Controllers\Features\TenantController')->get()->count();

        $steps = app('App\Http\Controllers\Utilities\TypeController')->getSteppers();

        return view('livewire.features.tenant.tenant-index-component', compact(
            'tenants',
            'statuses',
            'categories',
            'propertyTenantsCount',
            'steps'
        ));
    }
}
