<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\{AccountPayableParticular,AccountPayable};

class AccountPayableShowComponent extends Component
{
    public $accountpayable;

    public $status;

    public function mount(){
        $this->status = $this->accountpayable->status;
    }

    public function changeAccountPayableStatus(){
        AccountPayable::where('id', $this->accountpayable->id)
        ->update([
            'status' => $this->status
        ]);

        if($this->status === 'pending'){
            return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id.'/step-2')->with('success', 'Changes Saved!');
        }
        elseif($this->status === 'released'){
            return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id)->with('success', 'Changes Saved!');
        }
        elseif($this->status === 'prepared'){
            return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id.'/step-3')->with('success', 'Changes Saved!');
        }
        elseif($this->status === 'approved by manager'){
            return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id.'/step-4')->with('success', 'Changes Saved!');
        }
        elseif($this->status === 'approved by ap'){
            return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id.'/step-6')->with('success', 'Changes Saved!');
        }
        else{
            return redirect('/property/'.Session::get('property_uuid').'/rfp/'.$this->accountpayable->id)->with('success', 'Changes Saved!');
        }

    }

     public function deleteAccountPayable($accountpayableId){


      $batch_no = AccountPayable::find($accountpayableId)->batch_no;

      AccountPayable::where('batch_no', $batch_no)->delete();

      AccountPayableParticular::where('batch_no', $batch_no)->delete();

        return redirect('/property/'.Session::get('property_uuid').'/rfp/')->with('success', 'Changes Saved!');

    }

    public function render()
    {
        return view('livewire.account-payable-show-component',[
             'particulars' => AccountPayableParticular::where('batch_no', $this->accountpayable->batch_no)->get()
        ]);
    }
}
