<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Session;
use App\Models\AccountPayable;
use Livewire\WithFileUploads;
use DB;
use Carbon\Carbon;

class AccountPayableComponent extends Component
{
    use WithFileUploads;

    public $request_for;
    public $particular_id;
    public $requester_id;
    public $biller_id;
    public $amount;
    public $source;
    public $attachment;
    public $remarks;

    public $status;

    public $sendEmailToManager;

    public function mount(){
        $this->sendEmailToManager = false;
        $this->requester_id = auth()->user()->id;
    }

    protected function rules()
    {
        return [
            'request_for' => 'required',
            'particular_id' => ['required', Rule::exists('particulars', 'id')],
            'requester_id' => ['required', Rule::exists('users', 'id')],
            'biller_id' => ['required', Rule::exists('users', 'id')],
            'amount' => ['required'],
            'source' => ['required'],
            'attachment' => 'required | mimes:jpg,bmp,png,pdf,docx|max:10240',
            'remarks' => ['nullable']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

     public function submitForm()
      {
        sleep(1);

        //validate inputs
        $validatedData = $this->validate();

        try {

            DB::transaction(function () use ($validatedData){ 

            $validatedData['remarks'] = 'none';
            $validatedData['property_uuid'] = Session::get('property');

            if($this->attachment)
            {
                $validatedData['attachment'] = $this->attachment->store('accountpayables');
            }

            AccountPayable::create($validatedData);

            if($this->sendEmailToManager)
            {
                $this->send_mail_to_tenant();
            }
            });
                  
            return redirect('/property/'.Session::get('property').'/accountpayable/pending')->with('success','Request is successfully created.');
            
        }catch (\Exception $e) {
            session()->flash('error');
        }
      }

      public function removeAttachment()
      {
        $this->attachment = '';
      }

      public function get_statuses()
      {
           return AccountPayable::where('property_uuid', Session::get('property'))
           ->select('status', DB::raw('count(*) as count'))
           ->groupBy('status')
           ->get();
      }

    public function render()
    {
        return view('livewire.account-payable-component',[
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->show(Session::get('property')),
            'users' => app('App\Http\Controllers\UserPropertyController')->get_property_users(Session::get('property')),
            'billers' => app('App\Http\Controllers\PropertyBillerController')->show(Session::get('property')),
            'statuses' => $this->get_statuses()
        ]);
    }
}
