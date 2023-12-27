<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\{AcknowledgementReceipt,Bill,Collection};

class CollectionEditComponent extends Component
{
    public Collection $collection;

    //input variables
    public $or_no;

    public function mount($collection){
        $this->or_no = $collection->or_no;
    }

    protected function rules()
    {
        return [
            'or_no' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update(){

        $validatedInput = $this->validate();

        Collection::where('property_uuid', Session::get('property_uuid'))->where('ar_no', $this->collection->ar_no)->update($validatedInput);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.collection-edit-component');
    }
}
