<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Livewire\WithPagination;
use App\Models\{Type,Property,Tenant};

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

    public function clearFilters(){
        $this->search = null;
        $this->status = null;
        $this->category = null;
    }

    public function render()
    {
        $statuses =  Tenant::where('property_uuid', Session::get('property_uuid'))
        ->select('status')
        ->whereNotNull('status')
        ->groupBy('status')
        ->get();

       $categories = Tenant::where('property_uuid', Session::get('property_uuid'))
        ->select('category')
        ->whereNotNull('category')
        ->groupBy('category')
        ->get();

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

        $propertyTenantsCount =Property::find(Session::get('property_uuid'))->tenants()->count();

        $stepper = Type::where('id', Session::get('property_type_id'))->pluck('stepper')->first();

        $steps = explode(",", $stepper);

        return view('livewire.features.tenant.tenant-index-component', [
            'tenants' => $tenants,
            'statuses' => $statuses,
            'categories' => $categories,
            'propertyTenantsCount' => $propertyTenantsCount,
            'steps' => $steps
        ]);
    }
}
