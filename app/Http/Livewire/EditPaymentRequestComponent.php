<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PaymentRequest;

class EditPaymentRequestComponent extends Component
{
    use WithFileUploads;

    public $payment_request;

    public $proof_of_payment;

    public $mode_of_payment;


    public function mount($payment_request){
        $this->mode_of_payment = 'bank';
        $this->proof_of_payment = $this->payment_request[0]->proof_of_payment;
    }

    protected function rules()
    {
        return [
                'mode_of_payment' => 'required',
                'proof_of_payment' => 'required | mimes:jpg,bmp,png,pdf,docx|max:10240',
            ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatePaymentRequest(){
        sleep(2);

        $this->validate();

        PaymentRequest::where('id', $this->payment_request->pluck('id')->first())->update([
            'mode_of_payment' => $this->mode_of_payment,
            'proof_of_payment' =>  $this->proof_of_payment->store('proof_of_payments'),
            'updated_at' => null
        ]);

        return redirect('/8/tenant/'.auth()->user()->username.'/payments/pending')->with('success', 'Success!');
    }

    public function removeAttachment(){
        $this->proof_of_payment = '';
    }

    public function render()
    {
        return view('livewire.edit-payment-request-component');
    }
}
