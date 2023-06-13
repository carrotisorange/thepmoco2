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
use App\Models\PropertyBiller;
use App\Notifications\SendAccountPayableStep2NotificationToManager;
use Illuminate\Support\Facades\Notification;
use App\Models\UserProperty;
use App\Models\User;

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

    public $biller;

    public $first_approver;
    public $second_approver;


    public function mount($accountpayable)
    {
        $this->request_for = 'payment/purchase';
        $this->batch_no = $accountpayable->batch_no;
        $this->requester_id = $accountpayable->requester_id;
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
        $this->particulars = $this->get_particulars();
        $this->amount = AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->sum('total');

    }

     protected function rules()
    {
        return [
            'particulars.*.item' => 'nullable',
            'particulars.*.quantity' => 'nullable',
            'particulars.*.price' => 'nullable',
            'particulars.*.total' => 'nullable',
            // 'particulars.*.file' => 'nullable',
            'particulars.*.unit_uuid' => 'nullable',
            'particulars.*.vendor_id' => 'nullable',
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate([
             'quotation1' => 'nullable | max:102400',
             'quotation2' => 'nullable | max:102400',
             'quotation3' => 'nullable | max:102400',
             'selected_quotation' => ['required_with:quotation1'],
        ]);

        if(!$this->get_particulars()->count()){
            return redirect(url()->previous())->with('error', 'Please add at least 1 particular.');
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
              'amount' => AccountPayableParticular::where('batch_no', $this->batch_no)->sum('total'),
              'vendor' => $this->vendor,
        ]);

        $manager = UserProperty::where('property_uuid', $this->property->uuid)->where('role_id', 9)->pluck('user_id')->first();
        
        $accountpayable = UserProperty::where('property_uuid', $this->property->uuid)->where('role_id', 4)->pluck('user_id')->first();

        $content = $this->accountpayable;

        if($manager){
            if($this->first_approver)
            {
                 $email_manager = User::find($this->first_approver)->email;
            }
            else
            {
                 $email_manager = User::find($manager)->email;
            }

            Notification::route('mail', $email_manager)->notify(new SendAccountPayableStep2NotificationToManager($content));
    
        }

        if($accountpayable){
            if($this->second_approver)
            {
                $email_accountpayable = User::find($this->second_approver)->email;
            }
            else
            {
                $email_accountpayable = User::find($accountpayable)->email;
            }

            Notification::route('mail', $email_accountpayable)->notify(new SendAccountPayableStep2NotificationToManager($content));
    
        }

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-3')->with('success', 'Success!');
    }

    public function get_particulars(){
        return AccountPayableParticular::where('batch_no', $this->batch_no)
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function addNewParticular(){

        app('App\Http\Controllers\AccountPayableParticularController')->store($this->batch_no);

        $this->particulars = $this->get_particulars();

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-1')->with('success', 'Success!');

        // session()->flash('success', 'Success!');
    }

    public function storeVendor(){
        

        $this->validate([
            'biller' => 'required'
        ]);

        PropertyBiller::updateOrCreate(
        [
             'property_uuid' => $this->property->uuid,
             'biller' => $this->biller
        ],
            
        [
            'property_uuid' => $this->property->uuid,
            'biller' => $this->biller
        ]);
        
        session()->flash('success', 'Success!');
        
        // return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-1')->with('success', 'Success!');
    }

    public function removeParticular($id){
        
        
        AccountPayableParticular::where('id', $id)->delete();

        return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$this->accountpayable->id.'/step-1')->with('success', 'Success!');
    }

    public function cancelRequest(){

        

       $batch_no = AccountPayable::find($this->accountpayable->id)->batch_no;

        AccountPayable::where('batch_no', $batch_no)->delete();

        AccountPayableParticular::where('batch_no', $batch_no)->delete();

        return redirect('/property/'.$this->property->uuid.'/accountpayable')->with('success','Success!');
    }

    public function updateParticulars(){
        try{
            foreach ($this->particulars as $particular) {      
              $particular
                // ->where('id', $id)
                ->update([
                    'unit_uuid' => $particular->unit_uuid,
                    'vendor_id' => $particular->vendor_id,
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

    public function deleteAccountPayable($accountpayableId){

      

      $batch_no = AccountPayable::find($accountpayableId)->batch_no;

      AccountPayable::where('batch_no', $batch_no)->delete();

      AccountPayableParticular::where('batch_no', $batch_no)->delete();

    return redirect('/property/'.$this->property->uuid.'/accountpayable/')->with('success', 'Success!');   

    }

    public function render()
    {
        // $this->particulars = $this->get_particulars();

        return view('livewire.account-payable-create-step1-component',[
            'units' => Property::find($this->property->uuid)->units,
            'vendors' => Property::find($this->property->uuid)->billers,
            'managers' => UserProperty::where('property_uuid', $this->property->uuid)->where('role_id', 9)->get(),
            'accountpayables' => UserProperty::where('property_uuid', $this->property->uuid)->where('role_id', 4)->get()
        ]);
    }
}
