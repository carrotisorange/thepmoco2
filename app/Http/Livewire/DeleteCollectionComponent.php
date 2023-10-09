<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use Livewire\Component;
use App\Models\Collection;
use Session;

class DeleteCollectionComponent extends Component
{
    public Collection $collection;

    //input variables
    public $description;

    protected function rules()
    {
        return [
            'description' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function deleteCollection(){

        $this->validate();

        Collection::where('property_uuid', Session::get('property_uuid'))
        ->where('ar_no', $this->collection->ar_no)
        ->update([
            'description' => $this->description
        ]);

        Collection::where('property_uuid', Session::get('property_uuid'))
        ->where('ar_no', $this->collection->ar_no)
        ->delete();

        return redirect(url()->previous())->with('success', 'Changes Saved!');

    }

    public function render()
    {
        return view('livewire.delete-collection-component');
    }
}
