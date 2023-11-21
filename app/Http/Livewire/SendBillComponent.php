<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Carbon\Carbon;
use App\Mail\SendBillToTenant;
use Illuminate\Support\Facades\Mail;
use App\Models\{Property,Bill,Collection};

class SendBillComponent extends Component
{
    public $tenant;

    public $email;
    public $due_date;
    public $penalty;
    public $noteToBill;
    public $totalUnpaidBills;

    public function mount($tenant){
        $this->email = $tenant->email;
        $this->due_date = Carbon::now()->addDays(7)->format('Y-m-d');
        $this->noteToBill = Property::find(Session::get('property_uuid'))->note_to_bill;
        $this->totalUnpaidBills = Bill::postedBills('tenant_uuid',$this->tenant->uuid) - Collection::postedCollections('tenant_uuid',$this->tenant->uuid);
        $this->penalty = (Bill::postedBills('tenant_uuid',$this->tenant->uuid) - Collection::postedCollections('tenant_uuid',$this->tenant->uuid))*.1;
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

        $data =  app('App\Http\Controllers\Features\BillController')->get_bill_data($this->tenant, $this->due_date, $this->penalty, $this->noteToBill);

        Mail::to($this->email)->send(new SendBillToTenant($data));

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.send-bill-component');
    }
}
