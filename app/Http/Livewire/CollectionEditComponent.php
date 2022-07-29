<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Collection;
use App\Models\Bill;
use Carbon\Carbon;

class CollectionEditComponent extends Component
{
    public $batch_no;
    public $tenant;
    public $collections;
    public $attachment;
    public $form = 'cash';
    public $bank;
    public $check_no;
    public $created_at;
    public $date_deposited; 
    public $sendPayment = false;

    public function mount($collections, $tenant, $batch_no)
    {
        $this->batch_no = $batch_no;
        $this->tenant = $tenant;
        $this->collections = $collections;
        $this->created_at = Carbon::now()->format('Y-m-d');
    }

    protected function rules()
    {
      return [
       'created_at' => 'required|date',
       'form' => 'required',
      ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
