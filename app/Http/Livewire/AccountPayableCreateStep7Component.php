<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AccountPayableLiquidationParticular;
use App\Models\AccountPayableLiquidation;
use App\Models\AccountPayable;
use App\Notifications\SendAccountPayableStep3NotificationToAP;
use App\Notifications\SendAccountPayableStep4NotificationToAdmin;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\UserProperty;
use Session;
use DB;

class AccountPayableCreateStep7Component extends Component
{
    public $accountpayable;
    public $cash_advance;
    public $cv_number;
    public $total;
    public $particulars;

     protected function rules()
    {
        return [
            'particulars.*.expense_type_id' => 'required',
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }

    public function mount($accountpayable){
        $this->total = AccountPayableLiquidationParticular::where('batch_no', $accountpayable->batch_no)->sum('total');
        $this->cash_advance = AccountPayableLiquidation::where('batch_no',  $accountpayable->batch_no)->pluck('cash_advance')->first();
        $this->cv_number = sprintf('%08d', AccountPayable::where('property_uuid',Session::get('property_uuid'))->where('status', '!=', 'pending')->count());
        $this->particulars = $this->get_particulars();
    }

    public function get_particulars(){
        return AccountPayableLiquidationParticular::where('batch_no', $this->accountpayable->batch_no)->get();
    }

     public function updateLiquidation($id){

        $this->validate();

        try{
            foreach ($this->particulars->where('id', $id) as $particular) {

            AccountPayableLiquidationParticular::where('id', $id)
            ->update([
                'expense_type_id' => $particular->expense_type_id,
            ]);


            }

              $this->particulars = $this->get_particulars();

            session()->flash('success', 'Changes Saved!');

        }catch(\Exception $e){

            $this->particulars = $this->get_particulars();

            return back()->with('error','Cannot perform the action. Please try again.');
       }
    }

    public function finishChartOfAccount(){

        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
            'status' => 'completed',
            'amount' => AccountPayableLiquidationParticular::where('batch_no', $this->accountpayable->batch_no)->sum('total')
        ]);

        $requester_email = User::find($this->accountpayable->requester_id)->email;

        $content = $this->accountpayable;

        Notification::route('mail', $requester_email)->notify(new SendAccountPayableStep4NotificationToAdmin($content));

       return redirect('/property/'.Session::get('property_uuid').'/rfp/')->with('success', 'Changes Saved!');
    }

    public function render()
    {
        return view('livewire.account-payable-create-step7-component',[
            'accountpayableliquidation' =>  AccountPayableLiquidation::where('batch_no', $this->accountpayable->batch_no)->first(),
            'expense_types' => DB::table('expense_types')->get(),
        ]);
    }
}
