<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AccountPayableCreateStep1Component extends Component
{
    use WithFileUploads;

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
    
    public function mount()
    {
        $this->requester_id = auth()->user()->id;
        $this->created_at = Carbon::now()->format('Y-m-d');
        $this->due_date = Carbon::now()->format('Y-m-d');
        $this->batch_no = AccountPayable::count().'-'.sprintf('%08d', AccountPayable::where('property_uuid',$this->property->uuid)->count()).'-'.Str::random(3);
        // $this->amount = ($this->get_particulars()->sum('price') *$this->get_particulars()->sum('quantity'))/$this->get_particulars()->count();
    }

     protected function rules()
    {
        return [
            'particulars.*.item' => 'nullable',
            'particulars.*.quantity' => 'nullable',
            'particulars.*.price' => 'nullable',
            'particulars.*.total' => 'nullable',
            'particulars.*.file' => 'nullable',
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

         $accountpayable_id = AccountPayable::updateOrCreate(
        [
            'batch_no' => $this->batch_no,
            'property_uuid' => $this->property->uuid,
            'request_for' => $this->request_for
        ]
        ,[
            'property_uuid' => $this->property->uuid,
            'request_for' => $this->request_for,
            'created_at' => $this->created_at,
            'due_date' => $this->due_date,
            'requester_id' => $this->requester_id,
            'batch_no' => $this->batch_no,
            'amount' => $this->get_particulars()->sum('total'),
            'vendor' => $this->vendor,
            'bank' => $this->bank,
            'bank_name' => $this->bank_name, 
            'bank_account' => $this->bank_account,
            'delivery_at' => $this->delivery_at
         ])->id; 

        AccountPayable::where('id', $accountpayable_id)
        ->update([
          'approver_id' => null,
          'approver2_id' => null
        ]);

             if($this->quotation1){
            AccountPayable::where('id', $accountpayable_id)
            ->update([
                'quotation1' => $this->quotation1->store('accountpayables'),
            ]);
        }if($this->quotation2){
            AccountPayable::where('id', $accountpayable_id)
            ->update([
                'quotation2' => $this->quotation1->store('accountpayables'),
            ]);
            
        }if($this->quotation3){
            AccountPayable::where('id', $accountpayable_id)
            ->update([
                'quotation3' => $this->quotation3->store('accountpayables'),
            ]);
            
        }     

        if($this->selected_quotation === 'quotation1'){
            AccountPayable::where('id', $accountpayable_id)
              ->update([
              'selected_quotation' => $this->quotation1->store('accountpayables'),
              'vendor' => $this->vendor,
              'status' => 'pending'
              ]);
        }

        if($this->selected_quotation === 'quotation2'){
             AccountPayable::where('id', $accountpayable_id)
              ->update([
              'selected_quotation' => $this->quotation2->store('accountpayables'),
              'vendor' => $this->vendor,
               'status' => 'pending'
              ]);
        }

        if($this->selected_quotation === 'quotation3'){
             AccountPayable::where('id', $accountpayable_id)
              ->update([
              'selected_quotation' => $this->quotation3->store('accountpayables'),
              'amount' => $this->amount,
              'vendor' => $this->vendor,
               'status' => 'pending'
              ]);
        }

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$accountpayable_id.'/step-3')->with('success', 'Success!');
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

        return view('livewire.account-payable-create-step1-component');
    }
}
