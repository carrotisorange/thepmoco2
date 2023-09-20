<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\Collection;
use App\Models\Bill;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\PaymentRequest;

class CollectionTenantEditComponent extends Component
{
    use WithFileUploads;

    public $batch_no;
    public $tenant;
    public $collections;
    public $attachment;
    public $proof_of_payment;
    public $form;
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
        $this->proof_of_payment = PaymentRequest::where('id',Session::get('payment_request_id'))->pluck('proof_of_payment')->first();
        $this->bank = PaymentRequest::where('id',Session::get('payment_request_id'))->pluck('bank_name')->first();
        $this->check_no = PaymentRequest::where('id',Session::get('payment_request_id'))->pluck('check_reference_no')->first();
        $this->date_deposited = PaymentRequest::where('id',Session::get('payment_request_id'))->pluck('date_deposited')->first();
        $this->form = PaymentRequest::where('id',Session::get('payment_request_id'))->pluck('mode_of_payment')->first();
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
        return Bill::where('property_uuid', Session::get('property_uuid'))
        ->where('is_posted', false)
        ->where('batch_no', $this->batch_no)->get();
    }

    public function get_collections()
    {
      return Collection::where('property_uuid', Session::get('property_uuid'))
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
