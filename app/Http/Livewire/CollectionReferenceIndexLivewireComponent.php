<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\{Bill,PaymentRequest, Tenant, Owner, Guest};

class CollectionReferenceIndexLivewireComponent extends Component
{
    use WithFileUploads;

    public $type;
    public $uuid;

    public $batch_no;
    public $attachment;
    public $proof_of_payment;
    public $form;
    public $bank;
    public $check_no;
    public $created_at;
    public $date_deposited;
    public $description;
    public $sendPayment = false;
    public $payer;


    public function mount()
    {
        $this->payer = $this->getBillToName();
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
      return Bill::where($this->type.'_uuid', $this->uuid)
      ->where('batch_no', $this->batch_no)
      ->where('status', 'unpaid')
      ->posted()
      ->get();
    }

    public function getBillToName(){
        $billToName = null;

        if($this->type == 'tenant'){
            $billToName = Tenant::find($this->uuid)->tenant;
        }elseif($this->type == 'owner'){
            $billToName = Owner::find($this->uuid)->owner;
        }else{
            $billToName = Guest::find($this->uuid)->guest;
        }
        return $billToName;

    }

    public function render()
    {
        $collections = $this->get_collections();
        
        return view('livewire.collection-reference-index-livewire-component',compact('collections'));
    }
}
