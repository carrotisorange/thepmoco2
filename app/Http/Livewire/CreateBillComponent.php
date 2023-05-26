<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Models\Bill;

class CreateBillComponent extends Component
{
    public $property;
    public $guest;

    //input variables
    public $particular_id;
    public $unit_uuid;
    public $start;
    public $end;
    public $bill;

    public function mount(){
      $this->start = Carbon::now()->format('Y-m-d');
      $this->end = Carbon::now()->addMonth()->format('Y-m-d');
    }

    protected function rules()
    {
      return [
         'particular_id' => ['required', Rule::exists('particulars', 'id')],
         'start' => 'required|date',
         'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
         'end' => 'nullable|date|after:start',
         'bill' => 'required|numeric|min:1',
      ];
    }

    public function updated($propertyName)
    {
      $this->validateOnly($propertyName);
    }

    public function storeBill(){
        sleep(2);

        $validated = $this->validate();

        if($this->particular_id === '8'){
            $this->bill *=-1;
        }

        $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no($this->property->uuid);
        
        $validated['bill_no'] = $bill_no;
        $validated['bill'] = $this->bill;
        $validated['reference_no'] = $this->guest->reference_no;
        $validated['due_date'] = Carbon::parse($this->start)->addDays(7);
        $validated['user_id'] = auth()->user()->id;
        $validated['guest_uuid'] = $this->guest->uuid;
        $validated['property_uuid'] =$this->property->uuid;
        $validated['is_posted'] = true;

        Bill::create($validated);

        return redirect('/property/'.$this->property->uuid.'/guest/'.$this->guest->uuid)->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.create-bill-component',[
            'units' => Booking::where('guest_uuid', $this->guest->uuid)->get(),
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($this->property->uuid),
        ]);
    }
}
