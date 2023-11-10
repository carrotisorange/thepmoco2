<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use Illuminate\Validation\Rule;
use App\Models\{Bill,Guest,Contract,Booking};

class CreateBillComponent extends Component
{
    public $bill_to;

    //input variables
    public $particular_id;
    public $unit_uuid;
    public $start;
    public $end;
    public $bill;

    public function mount(){
      $this->start = Carbon::now()->format('Y-m-d');
    }

    protected function rules()
    {
      return [
         'particular_id' => ['required', Rule::exists('particulars', 'id')],
         'start' => 'required|date',
         'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
         'end' => 'required|date|after:start',
         'bill' => 'required|numeric|min:1',
      ];
    }

    public function updated($propertyName)
    {
      $this->validateOnly($propertyName);
    }

    public function submitButton(){

        $validated = $this->validate();

        if($this->particular_id === '8'){
            $this->bill *=-1;
        }

        $bill_no = app('App\Http\Controllers\Features\BillController')->getLatestBillNo(Session::get('property_uuid'));

        $validated['bill_no'] = $bill_no;
        $validated['bill'] = $this->bill;
        $validated['reference_no'] = $this->bill_to->reference_no;
        $validated['due_date'] = Carbon::parse($this->start)->addDays(7);
        $validated['user_id'] = auth()->user()->id;
        if(Guest::where('uuid', $this->bill_to->uuid)->count()){
          $validated['guest_uuid'] = $this->bill_to->uuid;
        }
        else{
          $validated['tenant_uuid'] = $this->bill_to->uuid;
        }

        $validated['property_uuid'] =Session::get('property_uuid');
        $validated['is_posted'] = true;

        Bill::create($validated);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function render()
    {
      if(Guest::where('uuid', $this->bill_to->uuid)->count()){
       $units = Booking::where('guest_uuid', $this->bill_to->uuid)->get();
      }
      else{
        $units = Contract::where('tenant_uuid', $this->bill_to->uuid)->get();
      }
        return view('livewire.create-bill-component',[
            'units' => $units,
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index(Session::get('property_uuid')),
        ]);
    }
}
