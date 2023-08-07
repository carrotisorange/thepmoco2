<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Collection;
use App\Models\Bill;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class CollectionTenantEditComponent extends Component
{
    use WithFileUploads;

    public $batch_no;
    public $tenant;
    public $collections;
    public $attachment;
    public $proof_of_payment;
    public $form = 'cash';
    public $bank;
    public $check_no;
    public $created_at;
    public $date_deposited; 
    public $description;
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
       'attachment' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
       'proof_of_payment' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
      ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function removeAttachment($attachment){
        $this->$attachment  = '';
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
        return view('livewire.collection-tenant-edit-component',[
            'bills' => $this->get_bills()
        ]);
    }
}
