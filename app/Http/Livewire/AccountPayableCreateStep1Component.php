<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use App\Models\AccountPayable;
use App\Models\AccountPayableParticular;
use Livewire\WithFileUploads;
use App\Models\Property;
use App\Models\PropertyBiller;
use App\Notifications\SendAccountPayableStep2NotificationToManager;
use Illuminate\Support\Facades\Notification;
use App\Models\UserProperty;
use App\Models\User;
use Session;

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
        $this->first_approver = $accountpayable->approver_id;
        $this->second_approver = $accountpayable->approver2_id;
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
        $this->particulars = $this->get_particulars();
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
            'first_approver' => 'required',
            'second_approver' => 'required'
        ]);

        $this->updateAccountPayable();

        $this->upload_quotations();

        $this->send_email_to_approvers();

        return redirect('/property/'.Session::get('property_uuid').'/accountpayable/'.$this->accountpayable->id.'/step-2')->with('success', 'Changes Saved!');
    }

    public function updateAccountPayable(){
        app('App\Http\Controllers\AccountPayableController')->update(
            $this->accountpayable->id,
            $this->request_for,
            $this->created_at,
            $this->due_date,
            $this->requester_id,
            $this->get_particulars()->sum('total'),
            $this->vendor,
            $this->bank,
            $this->bank_name,
            $this->bank_account,
            $this->delivery_at,
            $this->first_approver,
            $this->second_approver,
            'pending',
            $this->selected_quotation,
        );
    }

    public function upload_quotations(){
        $this->validate([
            'quotation1' => 'nullable | max:102400',
            'quotation2' => 'nullable | max:102400',
            'quotation3' => 'nullable | max:102400',
            'selected_quotation' => ['required_with:quotation1'],

        ]);

        if($this->quotation1 && $this->accountpayable->quotation1 != $this->quotation1){
          AccountPayable::where('id', $this->accountpayable->id)
          ->update([
            'quotation1' => $this->quotation1->store('accountpayables'),
          ]);
        }

        if($this->quotation2 && $this->accountpayable->quotation2 != $this->quotation2){
          AccountPayable::where('id', $this->accountpayable->id)
          ->update([
            'quotation2' => $this->quotation2->store('accountpayables'),
          ]);
        }

        if($this->quotation3 && $this->accountpayable->quotation3 != $this->quotation3){
          AccountPayable::where('id', $this->accountpayable->id)
          ->update([
            'quotation3' => $this->quotation3->store('accountpayables'),
          ]);
        }
    }

    public function get_particulars(){
        return AccountPayableParticular::where('batch_no', $this->batch_no)
        ->orderBy('created_at', 'asc')
        ->get();
    }

    public function send_email_to_approvers(){

        $content = $this->accountpayable;

        if($this->first_approver)
        {
            $first_approver = User::find($this->first_approver)->email;
            Notification::route('mail', $first_approver)->notify(new SendAccountPayableStep2NotificationToManager($content));
        }
    }

    public function addNewParticular(){

        app('App\Http\Controllers\AccountPayableParticularController')->store($this->batch_no);

        $this->particulars = $this->get_particulars();

        return redirect('/property/'.Session::get('property_uuid').'/accountpayable/'.$this->accountpayable->id.'/step-1')->with('success', 'Changes Saved!');

    }

    public function storeVendor(){

        $this->validate([
            'biller' => 'required'
        ]);

        PropertyBiller::updateOrCreate(
        [
             'property_uuid' => Session::get('property_uuid'),
             'biller' => $this->biller
        ],

        [
            'property_uuid' => Session::get('property_uuid'),
            'biller' => $this->biller
        ]);

        session()->flash('success', 'Changes Saved!');

        // return redirect('/property/'.Session::get('property_uuid').'/accountpayable/'.$this->accountpayable->id.'/step-1')->with('success', 'Changes Saved!');
    }

    public function removeParticular($id){

        AccountPayableParticular::where('id', $id)->delete();

        return redirect('/property/'.Session::get('property_uuid').'/accountpayable/'.$this->accountpayable->id.'/step-1')->with('success', 'Changes Saved!');
    }

    public function cancelRequest(){

    //    $batch_no = AccountPayable::find($this->accountpayable->id)->batch_no;

    //     AccountPayable::where('batch_no', $batch_no)->delete();

    //     AccountPayableParticular::where('batch_no', $batch_no)->delete();

        return redirect('/property/'.Session::get('property_uuid').'/accountpayable')->with('success','Changes Saved!');
    }

    public function updateParticular($id){

        $this->validate();

        try{
            foreach ($this->particulars->where('id', $id) as $particular) {
              AccountPayableParticular::where('id', $id)
                ->update([
                    'unit_uuid' => $particular->unit_uuid,
                    'vendor_id' => $particular->vendor_id,
                    'item' => $particular->item,
                    'quantity' => $particular->quantity,
                    'price' => $particular->price,
                    'batch_no' => $this->batch_no,
                    'total' => $particular->quantity * $particular->price,
                ]);

            $this->amount = AccountPayableParticular::where('batch_no', $this->accountpayable->batch_no)->sum('total');

            $this->particulars = $this->get_particulars();

            session()->flash('success', 'Changes Saved!');
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

    return redirect('/property/'.Session::get('property_uuid').'/accountpayable/')->with('success', 'Changes Saved!');

    }

    public function render()
    {
        return view('livewire.account-payable-create-step1-component',[
            'units' => Property::find(Session::get('property_uuid'))->units,
            'vendors' => Property::find(Session::get('property_uuid'))->billers,
            'managers' => UserProperty::where('property_uuid', Session::get('property_uuid'))->where('role_id', 9)->where('user_id', '!=',97)->approved()->get(),
            'accountpayables' => UserProperty::where('property_uuid', Session::get('property_uuid'))->where('role_id', 4)->where('user_id','!=' ,97)->approved()->get()
        ]);
    }
}
