<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Collection;
use App\Models\Bill;

class CollectionEditComponent extends Component
{
    public $batch_no;
    public $tenant;
    public $collections;

    public function mount($collections, $tenant, $batch_no)
    {
        $this->batch_no = $batch_no;
        $this->tenant = $tenant;
        $this->collections = $collections;
    }

    public function get_bills()
    {
        return Bill::where('property_uuid', Session::get('property'))
        ->where('is_posted', false)
        ->where('batch_no', $this->batch_no)->get();
    }

    public function get_collections()
    {
      return Collection::where('property_uuid', Session::get('property'))
      ->where('is_posted', false)
      ->where('batch_no', $this->batch_no)->get();
    }

    public function render()
    {
        return view('livewire.collection-edit-component',[
            'bills' => $this->get_bills()
        ]);
    }
}
