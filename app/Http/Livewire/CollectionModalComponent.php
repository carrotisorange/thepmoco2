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
    
    public $selectedBills = [];
    public $bank;
    public $check_no;
    public $created_at;
    public $date_deposited;
    public $total;
    public $attachment;
    public $tenant;
    public $collections;
    public $form;
    public $bill;
    public $amount;

    public $exportCollection;

    public function mount($selectedBills, $total, $tenant)
    {
        $this->selectedBills = $selectedBills;
        $this->collections = $this->get_collections();
        // $this->collections = Bill::whereIn('id',$this->selectedBills)->whereIn('status', ['unpaid', 'partially_paid'])->get();
        $this->form = 'cash';
        $this->amount = Bill::selectRaw('bill-initial_payment as balance')->whereIn('id',$this->selectedBills)->whereIn('status', ['unpaid', 'partially_paid'])->pluck('balance');
        $this->bill = Bill::selectRaw('bill-initial_payment as balance')->whereIn('id',$this->selectedBills)->whereIn('status', ['unpaid', 'partially_paid'])->pluck('balance');
        $this->total = $total;
        $this->collection = $total;
        $this->created_at = Carbon::now()->format('Y-m-d');
        $this->tenant = $tenant;
        $this->exportCollection = false;
    }

    public function get_collections()
    {
        return Bill::whereIn('id',$this->selectedBills)->whereIn('status', ['unpaid', 'partially_paid'])->get();
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

    public function payBill()
    {
        sleep(1);

        try{
            DB::beginTransaction();

            $validated_data = $this->validate();

            $collection_ar_no = Property::find(Session::get('property'))->acknowledgementreceipts->max('ar_no')+1;

            $collection_batch_no = Carbon::now()->timestamp.''.$collection_ar_no;

            $this->store_collection($validated_data, $collection_ar_no, $collection_batch_no);

            app('App\Http\Controllers\PointController')->store(Session::get('property'), count($this->selectedBills), 4);

            $ar = $this->store_ar($collection_ar_no, $collection_batch_no);

            DB::commit();
            
            $this->resetForm();

            $this->export_ar($ar);

            $this->closeModal();
    
       }catch(\Exception $e)
       {    
           DB::rollback();

           ddd($e);
           
           return back()->with('error','Cannot perform your action.');
       }
    }

    public function export_ar($ar)
    {
        if($this->exportCollection)
        {
            return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant.'/ar/'.$ar->id.'/export/')->with('success','Collection is successfully created.');
        }
         else
        {
            return redirect('/property/'.Session::get('property').'/tenant/'.$this->tenant.'/bills')->with('success','Collection is successfully created.');
        }
    }

    public function store_ar($collection_ar_no , $collection_batch_no)
    {
        $ar = AcknowledgementReceipt::create([
          'tenant_uuid' => $this->tenant,
          'amount' => Collection::where('property_uuid', Session::get('property'))->where('tenant_uuid', $this->tenant)->where('batch_no', $collection_batch_no)->sum('collection'),
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

    public function store_collection($validated_data, $collection_ar_no , $collection_batch_no)
    {
        ddd($this->collections);

        // foreach ($this->collections as $collection) {
        //     $collection->save();
        // }

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
                //ddd($i.'-'.$this->amount[1]);

                $validated_data['tenant_uuid']= $this->tenant;
                $validated_data['unit_uuid']= Bill::find($this->selectedBills[$i])->unit_uuid;
                $validated_data['property_uuid'] = Session::get('property');
                $validated_data['user_id'] = auth()->user()->id;
                $validated_data['bill_id'] = $i;
                $validated_data['bill_reference_no']= Tenant::find($this->tenant)->bill_reference_no;
                $validated_data['form'] = $this->form;
                $validated_data['collection'] = $this->bill[$i];
                $validated_data['batch_no'] = $collection_batch_no;
                $validated_data['ar_no'] = $collection_ar_no;

                $particular_id = Bill::find($this->selectedBills[$i])->particular_id;

                if($particular_id === 3 || $particular_id === 4)
                {
                    $validated_data['is_deposit'] = '1';
                }

                //save the payment
                Collection::create($validated_data)->unit_uuid;

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

    public static function modalMaxWidth(): string
    {
        return '6xl';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.collection-modal-component');
    }
}
