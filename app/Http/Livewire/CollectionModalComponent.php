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
use App\Models\Point;
use DB;
use App\Models\Unit;
use App\Models\Contract;

class CollectionModalComponent extends ModalComponent
{
    use WithFileUploads;
    
    public $selectedBills;
    public $bank;
    public $check_no;
    public $created_at;
    public $date_deposited;
    public $total;
    public $attachment;
    public $tenant;
    public $collection;
    public $form;
    public $bill;

    public $exportCollection;

    public function mount($selectedBills, $total, $tenant)
    {
        $this->selectedBills = $selectedBills;
        $this->collections = Bill::whereIn('id',$this->selectedBills)->whereIn('status', ['unpaid', 'partially_paid'])->get();
        $this->form = 'cash';
        $this->bill = Bill::selectRaw('bill-initial_payment as balance')->whereIn('id',$this->selectedBills)->whereIn('status', ['unpaid', 'partially_paid'])->pluck('balance');
        $this->total = $total;
        $this->collection = $total;
        $this->created_at = Carbon::now()->format('Y-m-d');
        $this->tenant = $tenant;
        $this->exportCollection = true;
    }

    protected function rules()
    {
        return [
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
        sleep(1);

        try{
            DB::beginTransaction();

            $validatedData = $this->validate();

            $collection_ar_no = Property::find(Session::get('property'))->acknowledgementreceipts->max('ar_no')+1;

            $collection_batch_no = Carbon::now()->timestamp.''.$collection_ar_no;

            $this->store_collection($validatedData, $collection_ar_no, $collection_batch_no);

            $this->store_point();

            $ar = $this->store_ar($collection_ar_no, $collection_batch_no);

            DB::commit();
            
            $this->resetForm();

           $this->export_ar($ar);
    
       }catch(\Exception $e)
       {    
           DB::rollback();
            return back()->with('error','Cannot perform your action.');
       }
    }

    public function export_ar($ar)
    {
        if($this->exportCollection)
        {
            return redirect('/tenant/'.$this->tenant.'/ar/'.$ar->id.'/export/')->with('success','Collection is successfully created.');
        }
         else
        {
            return redirect('/tenant/'.$this->tenant.'/bills')->with('success','Collection is successfully created.');
        }
    }

    public function store_ar($collection_ar_no , $collection_batch_no)
    {
        $ar = AcknowledgementReceipt::create([
          'tenant_uuid' => $this->tenant,
          'amount' => Collection::where('property_uuid', Session::get('property'))->where('tenant_uuid',
          $this->tenant)->where('batch_no', $collection_batch_no)->sum('collection'),
          'property_uuid' => Session::get('property'),
          'user_id' => auth()->user()->id,
          'ar_no' => $collection_ar_no,
          'mode_of_payment' => $this->form,
          'collection_batch_no' => $collection_batch_no,
          'cheque_no' => $this->check_no,
          'bank' => $this->bank,
          'date_deposited' => $this->date_deposited,
          'created_at' => $this->created_at,
        ]);

        if($this->attachment)
        {
            AcknowledgementReceipt::find($ar->id)
            ->update([
                'attachment' => $this->attachment->store('attachments')
            ]);
        }

        return $ar;
    }

    public function store_point()
    {
        Point::create([
            'user_id' => auth()->user()->id,
            'point' => count($this->selectedBills),
            'action_id' => 4,
            'property_uuid' => Session::get('property')
        ]);
    }

    public function store_collection($validatedData, $collection_ar_no , $collection_batch_no)
    {
        for($i=0; $i<count($this->selectedBills); $i++)
        {
            if((Bill::find($this->selectedBills[$i])->bill - Bill::find($this->selectedBills[$i])->initial_payment)<=$this->bill[$i])
            {
                Bill::where('id', $this->selectedBills[$i])
                ->update([
                    'status' => 'paid',
                ]);

                Bill::find($this->selectedBills[$i])->increment('initial_payment', $this->bill[$i]);
            }
            else
            {
                Bill::where('id', $this->selectedBills[$i])
                ->update([
                    'status' => 'partially_paid',
                ]);

                Bill::find($this->selectedBills[$i])->increment('initial_payment', $this->bill[$i]);
            }
                       
                $validatedData['tenant_uuid']= $this->tenant;
                $validatedData['unit_uuid']= Bill::find($this->selectedBills[$i])->unit_uuid;
                $validatedData['property_uuid'] = Session::get('property');
                $validatedData['user_id'] = auth()->user()->id;
                $validatedData['bill_id'] = $this->selectedBills[$i];
                $validatedData['bill_reference_no']= Tenant::find($this->tenant)->bill_reference_no;
                $validatedData['form'] = $this->form;
                $validatedData['collection'] = $this->bill[$i];
                $validatedData['batch_no'] = $collection_batch_no;
                $validatedData['ar_no'] = $collection_ar_no;

                $particular_id = Bill::find($this->selectedBills[$i])->particular_id;

                if($particular_id === 3 || $particular_id === 4)
                {
                    $validatedData['is_deposit'] = '1';
                }

                //save the payment
                Collection::create($validatedData)->unit_uuid;

                if(Tenant::find($this->tenant)->bills()->whereIn('status', ['unpaid', 'partially_paid'])->where('description', 'movein charges')->sum('bill') <= 0)
                {   
                    Unit::where('uuid',Bill::find($this->selectedBills[$i])->unit_uuid)
                    ->where('status_id', '4')
                    ->update([
                        'status_id' => '2'
                    ]);

                    Contract::where('unit_uuid', Bill::find($this->selectedBills[$i])->unit_uuid)
                    ->where('status', 'pending')
                    ->update([
                        'status' => 'active'
                    ]);
                }
                else
                {
                    Unit::where('uuid',Bill::find($this->selectedBills[$i])->unit_uuid)
                    ->where('status_id', '2')
                    ->update([
                        'status_id' => '4'
                    ]);

                    Contract::where('unit_uuid', Bill::find($this->selectedBills[$i])->unit_uuid)
                    ->where('status', 'active')
                    ->update([
                        'status' => 'pending'
                    ]);
                }
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
        $this->dispatchBrowserEvent('closeModal', 'collection-modal-component');
    }
    public function render()
    {
        return view('livewire.collection-modal-component');
    }
}
