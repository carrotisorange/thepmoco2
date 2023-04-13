<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Property;

class AccountPayableCreateStep1Component extends Component
{
    use WithFileUploads;

    public $accountpayable;

    public $request_for;
    public $created_at; 
    public $due_date;
    public $requester_id;

    public $batch_no;

    public $particulars;

    public $property;

    public $vendor;
    public $delivery_at;

    public $bank;
    public $bank_account;
    public $bank_name;

    public $quotation1;
    public $quotation2;
    public $quotation3;
    public $amount;
    public $selected_quotation;
    
    public function mount($accountpayable)
    {
        $this->request_for = $accountpayable->request_for;
        $this->batch_no = $accountpayable->batch_no;
        $this->requester_id = auth()->user()->id;
        $this->created_at = Carbon::parse($this->created_at)->format('Y-m-d');
        $this->due_date = Carbon::parse($this->due_date)->format('Y-m-d');
        $this->quotation1 = $accountpayable->quotation1;
        $this->quotation2 = $accountpayable->quotation2;
        $this->quotation3 = $accountpayable->quotation3;
        $this->selected_quotation = $accountpayable->selected_quotation;
        $this->bank = $accountpayable->bank;
        $this->bank_account = $accountpayable->bank_account;
        $this->bank_name =$accountpayable->bank_name;
        $this->vendor = $accountpayable->vendor;
        $this->delivery_at = Carbon::parse($this->delivery_at)->format('Y-m-d');

    }

     protected function rules()
    {
        return [
            'particulars.*.item' => 'nullable',
            'particulars.*.quantity' => 'nullable',
            'particulars.*.price' => 'nullable',
            'particulars.*.total' => 'nullable',
            'particulars.*.file' => 'nullable',
            'particulars.*.unit_uuid' => 'nullable',
            'quotation1' => 'required | max:102400',
            'quotation2' => 'nullable | max:102400',
            'quotation3' => 'nullable | max:102400',
            'selected_quotation' => ['required_with:quotation1'],
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }

    public function submitForm()
    {
        sleep(1);

        $this->validate();

        if(!$this->get_particulars()->count()){
            return back()->with('error','Error!');
        }

        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
            'request_for' => $this->request_for,
             'created_at' => $this->created_at,
             'due_date' => $this->due_date,
             'requester_id' => $this->requester_id,
             'amount' => $this->get_particulars()->sum('total'),
             'vendor' => $this->vendor,
             'bank' => $this->bank,
             'bank_name' => $this->bank_name,
             'bank_account' => $this->bank_account,
             'delivery_at' => $this->delivery_at,
             'status' => 'pending'
        ]);

        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
          'approver_id' => null,
          'approver2_id' => null
        ]);

        if($this->quotation1 && $this->accountpayable->quotation1 != $this->quotation1){
        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
        'quotation1' => $this->quotation1->store('accountpayables'),
        ]);

        } if($this->quotation2 && $this->accountpayable->quotation2 != $this->quotation2){
        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
        'quotation2' => $this->quotation2->store('accountpayables'),
        ]);

        } if($this->quotation3 && $this->accountpayable->quotation3 != $this->quotation3){
        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
        'quotation3' => $this->quotation3->store('accountpayables'),
        ]);

        }

          AccountPayable::where('id', $this->accountpayable->id)
              ->update([
             'selected_quotation' => $this->selected_quotation,
              'amount' => $this->amount,
              'vendor' => $this->vendor,
              ]);

        //     if($this->selected_quotation === 'quotation1'){
        //     AccountPayable::where('id', $this->accountpayable->id)
        //       ->update([
        //          'selected_quotation' => $this->quotation1,
        //     //   'selected_quotation' => $this->quotation1->store('accountpayables'),
        //       'vendor' => $this->vendor,
        //       'status' => 'pending'
        //       ]);
        // }

        // if($this->selected_quotation === 'quotation2'){
        //      AccountPayable::where('id', $this->accountpayable->id)
        //       ->update([
        //     //   'selected_quotation' => $this->quotation2->store('accountpayables'),
        //      'selected_quotation' => $this->quotation2,
        //       'vendor' => $this->vendor,
        //        'status' => 'pending'
        //       ]);
        // }

        // if($this->selected_quotation === 'quotation3'){
        //      AccountPayable::where('id', $this->accountpayable->id)
        //       ->update([
        //     //   'selected_quotation' => $this->quotation3->store('accountpayables'),
        //      'selected_quotation' => $this->quotation3,
        //       'amount' => $this->amount,
        //       'vendor' => $this->vendor,
        //        'status' => 'pending'
        //       ]);

        // }

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-3')->with('success', 'Success!');
    }

    public function get_particulars(){
        return AccountPayableParticular::where('batch_no', $this->batch_no)
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function addNewParticular(){

        sleep(1);

        app('App\Http\Controllers\AccountPayableParticularController')->store($this->batch_no);

        session()->flash('success', 'Success!');
    }

    public function removeParticular($id){
        sleep(1);
        
        AccountPayableParticular::where('id', $id)->delete();

        session()->flash('success','Success!');
    }

    public function cancelRequest(){

        sleep(1);

        AccountPayableParticular::where('batch_no', $this->batch_no)->orWhere('item', '')->delete();

        return redirect('/property/'.$this->property->uuid.'/accountpayable')->with('success','Success!');
    }

    public function updateParticular($id){
        try{
            foreach ($this->particulars->where('id', $id) as $particular) {
                AccountPayableParticular::where('batch_no', $this->batch_no)
                ->where('id', $id)
                ->update([
                    'unit_uuid' => $particular->unit_uuid,
                    'item' => $particular->item,
                    'quantity' => $particular->quantity,
                    'price' => $particular->price,
                    'batch_no' => $this->batch_no,
                    'total' => $particular->quantity * $particular->price,
                ]);

            session()->flash('success', 'Success!');
            }
            
       }catch(\Exception $e){
            session()->flash('error', $e);
       }
    }

    public function removeQuotation($quotation)
    {
        $this->$quotation = '';
    }

    public function render()
    {
        $this->particulars = $this->get_particulars();

        return view('livewire.account-payable-create-step1-component',[
            'units' => Property::find($this->property->uuid)->units,
        ]);
    }
}
