<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PaymentRequest;
use Session;

class EditPaymentRequestComponent extends Component
{
    use WithFileUploads;

    public $payment_request;

    public $proof_of_payment;

    public $date_deposited;

    public $bank_name;

    public $check_reference_no;

    public $mode_of_payment;


    public function mount($payment_request){
        // $this->mode_of_payment = '';
        $this->proof_of_payment = $this->payment_request[0]->proof_of_payment;
    }

    protected function rules()
    {
        return [
                'mode_of_payment' => 'required',
                'proof_of_payment' => 'required | mimes:jpg,bmp,png,pdf,docx|max:10240',
                'date_deposited' => ['required_if:mode_of_payment,bank'],
                'bank_name' => ['required_if:mode_of_payment,bank'],
                'check_reference_no' => ['required_if:mode_of_payment,cheque','required_if:mode_of_payment,e-wallet' ],
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
            'date_deposited' => $this->date_deposited,
            'bank_name' => $this->bank_name,
            'check_reference_no' => $this->check_reference_no,
            'updated_at' => null
        ]);

        if(auth()->user()->role_id === 8){
            return redirect('/8/tenant/'.auth()->user()->username.'/payments/pending')->with('success', 'Success!');
        }else{
            return redirect('/property/'.Session::get('property_uuid').'/collection/pending');
        }

      
    }

    public function removeAttachment(){
        $this->proof_of_payment = '';
    }

    public function render()
    {
        return view('livewire.edit-payment-request-component');
    }
}
