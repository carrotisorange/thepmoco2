<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Livewire\WithPagination;
use App\Models\{Property,Type,Owner};

class OwnerIndexComponent extends Component
{
    use WithPagination;

    public $search = null;

    public function redirectToUnitSelectionPage(){

        return redirect('/property/'.Session::get('property_uuid').'/unit');
    }

    public function render()
    {
        $owners = Owner::search($this->search)
        ->where('property_uuid', Session::get('property_uuid'))
        ->orderBy('created_at')
        ->get();

        $propertyOwnersCount = app('App\Http\Controllers\Features\OwnerController')->get()->count();

        $steps = app('App\Http\Controllers\Utilities\TypeController')->getSteppers();

        return view('livewire.features.owner.owner-index-component', compact(
            'owners',
            'propertyOwnersCount',
            'steps'
        ));
    }
}
