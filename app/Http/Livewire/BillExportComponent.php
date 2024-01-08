<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use Carbon\Carbon;
use App\Models\{Property,Bill};

class BillExportComponent extends Component
{
    public $type;
    public $uuid;

    public $due_date;
    public $penalty;
    public $note_to_bill;
    public $totalUnpaidBills;

    public function mount(){
        $this->due_date = Carbon::now()->addDays(7)->format('Y-m-d');
        $this->note_to_bill = Property::find(Session::get('property_uuid'))->note_to_bill;
        $this->totalUnpaidBills = Bill::where('status', 'unpaid')->postedBills($this->type.'_uuid',$this->uuid);
        $this->penalty = Bill::where('status', 'unpaid')->postedBills($this->type.'_uuid',$this->uuid) * .1;
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

        return redirect('/property/'.Session::get('property_uuid').'/'.$this->type.'/'.$this->uuid.'/bill/export');
    }

    public function render()
    {
        return view('livewire.bill-export-component');
    }
}

