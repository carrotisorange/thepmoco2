<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\{Bill,Property};
use App\Mail\SendBillToTenant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class BillPostComponent extends Component
{
    public $batch_no;
    public $billTo;
    public $dueDate;
    public $penaltyAfterDueDate;
    public $noteToBill;
    public $sendBillToEmail;

    public function mount(){
        $this->sendBillToEmail = 'no';
        $this->dueDate = Carbon::now()->addDays(14)->format('Y-m-d');
        $this->penaltyAfterDueDate = 1231;
        $this->noteToBill = Property::find(Session::get('property_uuid'))->note_to_bill;
    }


     protected function rules()
     {
        return [
            'sendBillToEmail' => 'required',
            'dueDate' => 'required',
            'penaltyAfterDueDate' => 'required',
            'noteToBill' => 'required'
        ];
     }

     public function updated($propertyName)
     {
         $this->validateOnly($propertyName);
     }

    public function submit()
    {

        $this->validate();

        try{
            Bill::where('property_uuid', Session::get('property_uuid'))
            ->where('is_posted', false)
            ->where('batch_no', $this->batch_no)
            ->update(
                [
                    'is_posted' => true,
                    'due_date' => $this->dueDate
                ]
            );

        $billTos =  Bill::where('property_uuid', Session::get('property_uuid'))
            ->where('is_posted', true)
            ->where('batch_no', $this->batch_no)
            ->get();

        if($this->sendBillToEmail == 'yes'){
            if(Session::get('billTo') == 'tenant'){
                foreach($billTos as $item){
                    app('App\Http\Controllers\PropertyController')->updateNoteToBill($this->noteToBill);
                    $data = app('App\Http\Controllers\Features\BillController')->get_bill_data($item->tenant,$this->dueDate, $this->penaltyAfterDueDate, $this->noteToBill);
                    Mail::to($item->tenant->email)->send(new SendBillToTenant($data));
                }
            }
        }

        return redirect('/property/'.Session::get('property_uuid').'/bill/')->with('success', 'Changes Saved!');

     }catch(\Exception $e){
        return redirect(url()->previous())->with('error', $e->getMessage());
     }
    }

    public function render()
    {
        return view('livewire.bill-post-component');
    }
}
