<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use App\Models\AccountPayable;

class AccountPayableCreateStep1Component extends Component
{
    public $request_for;
    public $created_at;
    public $requester_id;
    public $particular;
    public $property_uuid;
    
    public function mount()
    {
        $this->requester_id = auth()->user()->id;
        $this->created_at = Carbon::now()->format('Y-m-d');
        $this->property_uuid = Session::get('property');
    }

    protected function rules()
    {
         return [
            'request_for' => 'required',
            'created_at' => 'required',
            'requester_id' => 'required',
            'particular' => 'required'
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

        $this->store($this->property_uuid, $this->request_for, $this->created_at, $this->requester_id, $this->particular);

    }

    public function store($property_uuid, $request_for, $created_at, $requester_id, $particular){

         $accountpayable_id = AccountPayable::updateOrCreate(
            [
                'property_uuid' => $property_uuid,
                'request_for' => $request_for,
                'created_at' => $created_at,
                'requester_id' => $requester_id,
                'particular' => $particular
            ]
            ,
            [
                'property_uuid' => $property_uuid,
                'request_for' => $request_for,
                'created_at' => $created_at,
                'requester_id' => $requester_id,
                'particular' => $particular
            ])->id;

         return redirect('/property/'.$property_uuid.'/accountpayable/'.$accountpayable_id.'/step-2')->with('success', 'Step 1 is successfully accomplished!');
    }

    public function render()
    {
        return view('livewire.account-payable-create-step1-component');
    }
}
