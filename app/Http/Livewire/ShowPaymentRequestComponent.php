<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Models\PaymentRequest;

class ShowPaymentRequestComponent extends Component
{
    public $paymentRequest;

    public $reason_for_rejection;

    public function payBills(){

       Session::put('payment_request_id', $this->paymentRequest->id);

       return redirect('/property/'.Session::get('property_uuid').'/bill/tenant/'.$this->paymentRequest->tenant_uuid.'/bills');
    }

    public function declinePayments(){

        $validatedData = $this->validate([
            'reason_for_rejection' => 'required'
        ]);

        PaymentRequest::where('id', $this->paymentRequest->id)
        ->update([
            'reason_for_rejection' => $this->reason_for_rejection,
            'status' => 'declined'
        ]);


        return redirect('/property/'.Session::get('property_uuid').'/collection/'.'approved'.'/'.Session::get('property_uuid'));
    }

    public function render()
    {
        return view('livewire.show-payment-request-component');
    }
}
