<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\PaymentRequest;

class ShowPaymentRequestComponent extends Component
{
    public $paymentRequest;

    public function payBills(){
        
       Session::put('payment_request_id', $this->paymentRequest->id);

       return redirect('/property/'.Session::get('property_uuid').'/tenant/'.$this->paymentRequest->tenant_uuid.'/bills');
    }

    public function render()
    {
        return view('livewire.show-payment-request-component');
    }
}
