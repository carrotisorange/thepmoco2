<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayable;
use Livewire\WithFileUploads;


class AccountPayableCreateStep2Component extends Component
{
    use WithFileUploads;
    
    public $accountpayable;

    public $quotation1;
    public $quotation2;
    public $quotation3;
    public $vendor;
    public $amount;
    public $selected_quotation;
    
    public $property;


    protected function rules()
    {
         return [
            'quotation1' => 'required | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'quotation2' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'quotation3' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'vendor' => 'nullable',
            'amount' => 'nullable|gt:0',
            // 'selected_quotation' => ['required_with:quotation1'],
            'selected_quotation' => ['nullable'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        sleep(1);

        $this->validate();

        $this->store();
    }

    public function downloadInternalDocument(){
        sleep(2);

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step1/export');

    }

    public function store(){

        if($this->quotation1){
            AccountPayable::where('id', $this->accountpayable->id)
            ->update([
                'quotation1' => $this->quotation1->store('accountpayables'),
            ]);
        }if($this->quotation2){
            AccountPayable::where('id', $this->accountpayable->id)
            ->update([
                'quotation2' => $this->quotation1->store('accountpayables'),
            ]);
            
        }if($this->quotation3){
            AccountPayable::where('id', $this->accountpayable->id)
            ->update([
                'quotation3' => $this->quotation3->store('accountpayables'),
            ]);
            
        }     

        if($this->selected_quotation === 'quotation1'){
            AccountPayable::where('id', $this->accountpayable->id)
              ->update([
              'selected_quotation' => $this->quotation1->store('accountpayables'),
              'amount' => $this->amount,
              'vendor' => $this->vendor,
              'status' => 'prepared'
              ]);
        }

        if($this->selected_quotation === 'quotation2'){
             AccountPayable::where('id', $this->accountpayable->id)
              ->update([
              'selected_quotation' => $this->quotation2->store('accountpayables'),
              'amount' => $this->amount,
              'vendor' => $this->vendor,
               'status' => 'prepared'
              ]);
        }

        if($this->selected_quotation === 'quotation3'){
             AccountPayable::where('id', $this->accountpayable->id)
              ->update([
              'selected_quotation' => $this->quotation3->store('accountpayables'),
              'amount' => $this->amount,
              'vendor' => $this->vendor,
               'status' => 'prepared'
              ]);
        }

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-3')->with('success', 'Success!');
    }

    public function removeQuotation($quotation)
    {
        $this->$quotation = '';
    }
    
    public function render()
    {
        return view('livewire.account-payable-create-step2-component');
    }
}
