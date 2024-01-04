<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Carbon\Carbon;
use App\Models\{Property,Bill,Collection};

class BillExportComponent extends Component
{
    public $billTo;
    public $tenant;

    public $email;
    public $due_date;
    public $penalty;
    public $note_to_bill;
    public $totalUnpaidBills;

    public function mount($tenant){
        $this->email = $tenant->email;
        $this->due_date = Carbon::now()->addDays(7)->format('Y-m-d');
        $this->note_to_bill = Property::find(Session::get('property_uuid'))->note_to_bill;
        $this->totalUnpaidBills = Bill::postedBills('tenant_uuid',$this->tenant->uuid) - Collection::postedCollections('tenant_uuid',$this->tenant->uuid);
        $this->penalty = (Bill::postedBills('tenant_uuid',$this->tenant->uuid) - Collection::postedCollections('tenant_uuid',$this->tenant->uuid))*.1;
    }

    protected function rules()
    {
        return [
            'due_date' => 'required',
            'note_to_bill' => 'required'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function exportButton(){
        app('App\Http\Controllers\PropertyController')->updateNoteToBill($this->note_to_bill);

        Session::put('property_note_to_bill', $this->note_to_bill);
        Session::put('due_date', $this->due_date);
        Session::put('penalty', $this->penalty);

        return redirect('/property/'.Session::get('property_uuid').'/tenant/'.$this->tenant->uuid.'/bill/export');
    }

    public function render()
    {
        return view('livewire.bill-export-component');
    }
}

