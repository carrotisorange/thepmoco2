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
    
    public function mount()
    {
        $this->requester_id = auth()->user()->id;
        $this->created_at = Carbon::now()->format('Y-m-d');
        $this->due_date = Carbon::now()->format('Y-m-d');
        $this->batch_no = Str::random(8);
    }

     protected function rules()
    {
        return [
            'particulars.*.item' => 'nullable',
            'particulars.*.quantity' => 'nullable',
            'particulars.*.price' => 'nullable',
            'particulars.*.file' => 'nullable',
        ];
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }

    public function submitForm()
    {
        sleep(2);

        $this->validate();

        if(!$this->get_particulars()->count()){
            return back()->with('success','Success!');
        }

        $accountpayable_id = app('App\Http\Controllers\AccountPayableController')->store_step_1(
            $this->property->uuid,
            $this->request_for,
            $this->created_at,
            $this->due_date,
            $this->requester_id,
            $this->batch_no,
            ($this->get_particulars()->sum('price') * $this->get_particulars()->sum('quantity'))/$this->get_particulars()->count()
        );


        if($this->request_for === 'purchase'){
            return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$accountpayable_id.'/step-2')->with('success', 'Success!');
        }else{
            return redirect('/property/'.$this->property->uuid.'/accountpayable/'.$accountpayable_id.'/step-4')->with('success', 'Success!');
        }
    }

    public function get_particulars(){
        return AccountPayableParticular::where('batch_no', $this->batch_no)
        ->orderBy('created_at', 'desc')
        ->get();
    }

    public function addNewParticular(){

        sleep(2);

        app('App\Http\Controllers\AccountPayableParticularController')->store($this->batch_no);

        session()->flash('success', 'New particular is successfully added!');
    }

    public function removeParticular($id){
        sleep(2);
        
        AccountPayableParticular::where('id', $id)->delete();

        session()->flash('success', 'Inventory is successfully removed!');
    }

    public function cancelRequest(){

        sleep(2);

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
                ]);

                // if($particular->file){
                //     AccountPayableParticular::where('batch_no', $this->batch_no)
                //     ->where('id', $id)
                //     ->update([
                //         'file' => $particular->file->store('accountpayableparticulars'),
                //     ]);
                // }

            session()->flash('success', 'Inventory is successfully updated!');
            }
            
       }catch(\Exception $e){
            ddd($e);
       }
    }
    

    public function render()
    {
        $this->particulars = $this->get_particulars();

        return view('livewire.account-payable-create-step1-component');
    }
}
