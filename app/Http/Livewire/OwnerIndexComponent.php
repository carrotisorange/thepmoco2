<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use Livewire\Component;
use Session;
use Livewire\WithPagination;
use App\Models\Property;
use App\Models\Type;

class OwnerIndexComponent extends Component
{
    use WithPagination;

    public $search = null;

    public function redirectToUnitSelectionPage(){

        return redirect('/property/'.Session::get('property_uuid').'/unit');
    }

    public function render()
    {
        $propertyOwnersCount =Property::find(Session::get('property_uuid'))->owners()->count();

        $stepper = Type::where('id', Session::get('property_type_id'))->pluck('stepper')->first();

        $steps = explode(",", $stepper);

        return view('livewire.owner-index-component', [
        'owners' => Owner::search($this->search)
        ->where('property_uuid', Session::get('property_uuid'))
        ->orderBy('created_at', 'asc')
        ->paginate(10),
        'propertyOwnersCount' => $propertyOwnersCount,
        'steps' => $steps
    ]);
    }
}
