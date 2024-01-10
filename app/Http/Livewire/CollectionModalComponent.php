<?php

namespace App\Http\Livewire;

use Session;
use Carbon\Carbon;
use DB;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use App\Models\{AcknowledgementReceipt,Collection,Bill,Property,Tenant,Unit,Contract};

class CollectionModalComponent extends ModalComponent
{
    use WithFileUploads;

    public $selectedBills = [];
    public $bills;


    public $bank;
    public $check_no;
    public $created_at;
    public $date_deposited;
    public $total;
    public $attachment;
    public $tenant;
    public $collections;
    public $form = 'cash';
    public $bill;
    public $amount;

    public $exportCollection = false;

    public function mount($selectedBills, $total, $tenant)
    {
        $this->selectedBills = $selectedBills;
        $this->bills = $this->get_bills();
    }

    public function get_bills()
    {
        return Bill::whereIn('id',$this->selectedBills)
        ->where('status','unpaid')
        ->get();
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
        try{
            DB::beginTransaction();

            $validated_data = $this->validate();

            $collection_ar_no = Property::find(Session::get('property_uuid'))->acknowledgementreceipts->max('ar_no')+1;

            $collection_batch_no = Carbon::now()->timestamp.''.$collection_ar_no;

            $this->store_collection($validated_data, $collection_ar_no, $collection_batch_no);

            app('App\Http\Controllers\Utilities\PointController')->store(count($this->selectedBills), 4);

            $ar = $this->store_ar($collection_ar_no, $collection_batch_no);

            $this->export_ar($ar);

            DB::commit();

            $this->resetForm();

       }catch(\Exception $e)
       {
           DB::rollback();

           return back()->with('error','Cannot perform your action.');
       }
    }

    public function store_ar($collection_ar_no , $collection_batch_no)
    {
        $ar = AcknowledgementReceipt::create([
          'tenant_uuid' => $this->tenant,
          'amount' => Collection::where('property_uuid', Session::get('property_uuid'))->where('tenant_uuid', $this->tenant)->where('batch_no', $collection_batch_no)->sum('collection'),
          'property_uuid' => Session::get('property_uuid'),
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

                $validated_data['tenant_uuid']= $this->tenant;
                $validated_data['unit_uuid']= Bill::find($this->selectedBills[$i])->unit_uuid;
                $validated_data['property_uuid'] = Session::get('property_uuid');
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

                if(Tenant::find($this->tenant)->bills()->posted()->where('status', 'unpaid')->where('description',
                'movein charges')->sum('bill') <= 0)
                {
                    Unit::where('uuid',Bill::find($this->selectedBills[$i])->unit_uuid)
                    ->where('status_id', '4')
                    ->update([
                        'status_id' => '2'
                    ]);

                    Contract::where('unit_uuid', Bill::find($this->selectedBills[$i])->unit_uuid)
                    ->where('status', 'pendingmovein')
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
