<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayable;
use Session;
use Livewire\WithFileUploads;

use function PHPSTORM_META\map;

class AccountPayableCreateStep2Component extends Component
{
    use WithFileUploads;
    
    public $accountpayable_id;

    public $quotation1;
    public $quotation2;
    public $quotation3;
    public $vendor;
    public $amount;
    public $quantity;
    public $selected_quotation;
    
    public $property_uuid;

    public function mount(){
        $this->property_uuid = Session::get('property');
    }

    protected function rules()
    {
         return [
            'quotation1' => 'required | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'quotation2' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'quotation3' => 'nullable | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'vendor' => 'required',
            'quantity' => 'required',
            'amount' => 'required',
            'selected_quotation' => 'required | mimes:jpg,bmp,png,pdf,docx|max:10240',
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

    public function store(){

        if($this->quotation1){
            AccountPayable::where('id', $this->accountpayable_id)
            ->update([
                'quotation1' => $this->quotation1->store('accountpayables'),
            ]);
        }   
        
        if($this->quotation2){
            AccountPayable::where('id', $this->accountpayable_id)
            ->update([
                'quotation2' => $this->quotation1->store('accountpayables'),
            ]);
            
        }     

        if($this->quotation3){
            AccountPayable::where('id', $this->accountpayable_id)
            ->update([
                'quotation3' => $this->quotation3->store('accountpayables'),
            ]);
            
        }     

        if($this->selected_quotation){
            AccountPayable::where('id', $this->accountpayable_id)
            ->update([
                'selected_quotation' => $this->selected_quotation->store('accountpayables'),
                'amount' => $this->amount,
                'quantity' => $this->quantity,
                'vendor' => $this->vendor
            ]);
            
        }   


        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id.'/step-3')
        ->with('success', 'Step 2 is successfully accomplished!');
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
