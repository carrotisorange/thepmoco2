<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;
use Livewire\WithFileUploads;

class AccountPayableCreateStep6Component extends Component
{
    use WithFileUploads;

    public $accountpayable_id;

    public $attachment;

    public $property_uuid;
    
    public function mount()
    {
        $this->property_uuid = Session::get('property');
    }

    protected function rules()
    {
         return [
             'attachment' => 'required | mimes:jpg,bmp,png,pdf,docx|max:10240',
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

        if($this->attachment){
            AccountPayable::where('id', $this->accountpayable_id)
            ->update([
                'attachment' => $this->attachment->store('accountpayables'),
                
            ]);
            
        }    

        return redirect('/property/'.$this->property_uuid.'/accountpayable/'.$this->accountpayable_id)->with('success', 'Step 6 is successfully accomplished!');
    }

    public function removeAttachment(){
        $this->attachment = '';
    }

    public function render()
    {
        return view('livewire.account-payable-create-step6-component',[
            'accountpayable' => AccountPayable::find($this->accountpayable_id)
        ]);
    }
}
