<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\PaymentRequest;

class ShowPaymentRequestComponent extends Component
{
    public $paymentRequest;

    public $reason_for_rejection;

    public function payBills(){

       sleep(2);
        
       Session::put('payment_request_id', $this->paymentRequest->id);

       return redirect('/property/'.Session::get('property_uuid').'/tenant/'.$this->paymentRequest->tenant_uuid.'/bills');
    }

    public function declinePayments(){
        sleep(2);

        $validatedData = $this->validate([
            'reason_for_rejection' => 'required'
        ]);

        PaymentRequest::where('id', $this->paymentRequest->id)
        ->update([
            'reason_for_rejection' => $this->reason_for_rejection,
            'status' => 'declined'
        ]);


        return redirect('/property/'.Session::get('property_uuid').'/collection/declined');

    }

    public function render()
    {
        return view('livewire.show-payment-request-component');
    }
}
