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
    public $attachment;
    public $proof_of_payment;
    public $form;
    public $bank;
    public $check_no;
    public $created_at;
    public $date_deposited; 
    public $description;
    public $sendPayment = false;


    public function mount( $tenant, $batch_no)
    {
        $this->batch_no = $batch_no;
        $this->tenant = $tenant;
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

    public function get_collections()
    {
      return Bill::where('tenant_uuid', $this->tenant->uuid)
      ->where('batch_no', $this->batch_no)
      ->where('status', 'unpaid')
      ->posted()
      ->get();
    }

    public function render()
    {
        return view('livewire.collection-tenant-edit-component',[
            'collections' => $this->get_collections()
        ]);
    }
}
