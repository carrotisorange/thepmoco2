<?php

namespace App\Http\Livewire;

use App\Models\AcknowledgementReceipt;
use Session;
use App\Models\Collection;
use App\Models\Bill;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Carbon\Carbon;

class CollectionModalComponent extends ModalComponent
{

    use WithFileUploads;
    
    public $selectedBills;
    public $tenant;
    public $bank;
    public $check_no;
    public $created_at;
    public $date_deposited;
    public $total;
    public $attachment;

    public $collection;
    public $form;

    public function mount($selectedBills, $total)
    {
        $this->selectedBills = $selectedBills;
        $this->form = 'cash';
        $this->total = $total;
        $this->collection = $total;
        $this->created_at = Carbon::now()->format('Y-m-d');
    }

    protected function rules()
    {
        return [
            'collection' => 'required|numeric|min:1',
            'bank' => 'nullable',
            'check_no' => 'nullable',
            'attachment' => 'nullable',
            'created_at' => 'required',
      ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function submitForm()
    {
       try{
            sleep(1);

            $ar_no = Property::find(Session::get('property'))->collections->max('ar_no')+1;

            $batch_no = Carbon::now()->timestamp.''.$ar_no;

            $totalSelectedBills = Bill::whereIn('id',$this->selectedBills)->where('status', 'unpaid')->sum('bill');

            //full payment && $totalSelectedBills <= $this->collection
            if(count($this->selectedBills) > 1) {
            
                //check if the payment is sufficient to pay the selected bills
                if($this->collection<$totalSelectedBills)
                {
                    $validatedData = $this->validate();

                    $this->dispatchBrowserEvent('collection-modal-component');
                    return redirect('/tenant/'.$this->tenant.'/bills')->with('error','The collection is less than the bill.');
                }

                    for($i=0; $i<count($this->selectedBills); $i++)
                    {
                        $validatedData['tenant_uuid']= $this->tenant;
                        $validatedData['unit_uuid']= Bill::find($this->selectedBills[$i])->unit_uuid;
                        $validatedData['property_uuid'] = Session::get('property');
                        $validatedData['user_id'] = auth()->user()->id;
                        // $validatedData['ar_no'] = $ar_no++;
                        $validatedData['bill_id'] = $this->selectedBills[$i];
                        $validatedData['bill_reference_no']= Tenant::find($this->tenant)->bill_reference_no;
                        $validatedData['form'] = $this->form;
                        $validatedData['collection'] = Bill::find($this->selectedBills[$i])->bill;
                        $validatedData['batch_no'] = $batch_no;

                        if($this->attachment)
                        {
                            $validatedData['attachment'] = $this->attachment->store('attachments');
                        }

                        //save the payment
                        Collection::create($validatedData);

                        //change the status of the selected bills to paid
                        Bill::where('id', $this->selectedBills[$i])
                        ->update([
                        'status' => 'paid'
                        ]);
                    }

                      

            //partial payment
            }else{  

                $bill = Bill::find($this->selectedBills[0]);
                $new_bill= $bill->replicate();
                $new_bill->bill_no = $bill_no = Property::find(Session::get('property'))->bills->max('bill_no')+1; 
                $new_bill->bill = Bill::find($this->selectedBills[0])->bill - $this->collection;
                $new_bill->status= 'unpaid';
                $new_bill->save();

                Bill::where('id', $this->selectedBills[0])
                ->update([
                    'bill' => $this->collection,
                    'status' => 'paid'
                ]);

                 $validatedData['tenant_uuid']= $this->tenant;
                 $validatedData['unit_uuid']= Bill::find($this->selectedBills[0])->unit_uuid;
                 $validatedData['property_uuid'] = Session::get('property');
                 $validatedData['user_id'] = auth()->user()->id;
                 // $validatedData['ar_no'] = $ar_no++;
                 $validatedData['bill_id'] = $this->selectedBills[0];
                 $validatedData['bill_reference_no']= Tenant::find($this->tenant)->bill_reference_no;
                 $validatedData['form'] = $this->form;
                 $validatedData['collection'] = Bill::find($this->selectedBills[0])->bill;
                 $validatedData['batch_no'] = $batch_no;

                 if($this->attachment)
                 {
                    $validatedData['attachment'] = $this->attachment->store('attachments');
                 }

                 //save the payment
                 Collection::create($validatedData);
                
            }
            $ar = AcknowledgementReceipt::create([
            'tenant_uuid' => $this->tenant,
            'amount' => $this->collection,
            'property_uuid' => Session::get('property'),
            'user_id' => auth()->user()->id,
            'ar_no' => $ar_no,
            'mode_of_payment' => $this->form,
            'collection_batch_no' => $batch_no,
            'cheque_no' => $this->check_no,
            'bank' => $this->bank,
            'date_deposited' => $this->date_deposited,
            'created_at' => $this->created_at,
            ]);

            $this->resetForm();

            return redirect('/tenant/'.$this->tenant.'/ar/'.$ar->id.'/export/')->with('success','Collections
            have been recorded.');
          
    
       }catch(\Exception $e)
       {
            ddd($e);
            return back()->with('error','Cannot perform your action.');
       }
    }

    public function resetForm()
    {
        $this->collection='';
        $this->bank='';
        $this->check_no='';
        $this->attachment='';
        $this->date_deposited ='';
        $this->form = '';
        $this->dispatchBrowserEvent('collection-modal-component');
    }
    public function render()
    {
        return view('livewire.collection-modal-component');
    }
}
