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
    public $category;

    public function redirectToUnitSelectionPage(){
        sleep(2);

        $action = 'addNewTenant';

        return redirect('/property/'.Session::get('property').'/unit/');
    }

    public function render()
    {
        $statuses =  Tenant::where('property_uuid', Session::get('property'))
        ->select('status')
        ->whereNotNull('status')
        ->groupBy('status')
        ->get();

       $categories = Tenant::where('property_uuid', Session::get('property'))
        ->select('category')
        ->whereNotNull('category')
        ->groupBy('category')
        ->get();

        $tenants = Tenant::search($this->search)
        ->where('property_uuid', Session::get('property'))
        ->when($this->status, function($query){
          $query->where('status',$this->status);
        })
         ->when($this->category, function($query){
         $query->where('category',$this->category);
         })
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        
        return view('livewire.tenant-index-component', [
            'tenants' => $tenants,
            'statuses' => $statuses,
            'categories' => $categories
        ]);
    }
}
