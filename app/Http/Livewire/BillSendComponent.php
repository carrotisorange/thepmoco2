<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Mail\SendBillToTenant;
use Illuminate\Support\Facades\Mail;
use App\Models\{Bill,Tenant, Guest, Owner};

class BillSendComponent extends Component
{
    public $type;
    public $uuid;
    public $email;

    public $due_date;
    public $penalty;
    public $noteToBill;
    public $totalUnpaidBills;

    public function mount(){
        $this->due_date = Carbon::now()->addDays(7)->format('Y-m-d');
        $this->noteToBill = Session::get('property_note_to_bill');
        $this->totalUnpaidBills = Bill::where('status', 'unpaid')->postedBills($this->type.'_uuid',$this->uuid);
        $this->penalty = Bill::where('status', 'unpaid')->postedBills($this->type.'_uuid',$this->uuid) * .1;
    }

    protected function rules()
    {
        return [
            'email' => 'required'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function sendButton(){

        $this->validate();

        app('App\Http\Controllers\PropertyController')->updateNoteToBill($this->noteToBill);

            $data = $this->get_bill_data();

            Mail::to($this->email)->send(new SendBillToTenant($data));

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function get_bill_data()
    {
         $unpaid_bills = Bill::where('status', 'unpaid')->postedBills($this->type.'_uuid',$this->uuid);

         $paid_bills = Bill::where('status', 'paid')->postedBills($this->type.'_uuid',$this->uuid);

        if($unpaid_bills<=0){
            $balance=0;
        }else{
            $balance = $unpaid_bills - $paid_bills;
        }

        if($this->type == 'tenant'){
                $recipient = Tenant::find($this->uuid)->tenant;
            }elseif($this->type == 'owner'){
                 $recipient = Owner::find($this->uuid)->owner;
            }else{
                 $recipient = Guest::find($this->uuid)->guest;
        }

        return $data = [
            'recipient' => $recipient,
            'due_date' => $this->due_date,
            'bills' => Bill::where($this->type.'_uuid',$this->uuid)->posted()->where('status','unpaid')->orderBy('bill_no', 'desc')->get(),
            'balance' => $balance,
            'balance_after_due_date' => $balance + $this->penalty,
            'note_to_bill' => $this->noteToBill,
        ];
    }

    public function render()
    {
        return view('livewire.bill-send-component');
    }
}
