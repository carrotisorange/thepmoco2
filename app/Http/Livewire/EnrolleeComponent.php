<?php

namespace App\Http\Livewire;

use App\Mail\SendContractMailToOwner;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Enrollee;
use App\Models\Unit;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use App\Models\Point;
use App\Models\Property;
use Session;

class EnrolleeComponent extends Component
{
    use WithFileUploads;

    public $unit;
    public $owner;

    public function mount($unit, $owner)
    {
        $this->unit = $unit;
        $this->owner = $owner;
        $this->rent = $unit->rent;
        $this->discount = $unit->discount;
        $this->end = Carbon::now()->addYear()->format('Y-m-d');
        $this->start = Carbon::now()->format('Y-m-d');
        $this->term = Carbon::now()->addYear()->diffInDays(Carbon::now());
    }

    public $start;
    public $end;
    public $rent;
    public $discount;
    public $contract;

    protected function rules()
    {
    return [
    'start' => 'required|date',
    'end' => 'required|date|after:start',
    'rent' => 'required|gt:0',
    'discount' => 'required',
    'contract' => 'nullable'
    ];
    }

    public function updated($propertyName)
    {
    $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
    sleep(1);

    $contract_uuid = Str::uuid();

    $validatedData = $this->validate();

    try {
    DB::beginTransaction();

    $validatedData['uuid'] = $contract_uuid;
    $validatedData['owner_uuid'] = $this->owner->uuid;
    $validatedData['unit_uuid'] = $this->unit->uuid;
    $validatedData['user_id'] = auth()->user()->id;
    $validatedData['property_uuid'] = Session::get('property');

     if($this->contract)
     {
        $validatedData['contract'] = $this->contract->store('owner_contracts');
     }else{
        $validatedData['contract'] = Property::find(Session::get('property'))->owner_contract;
     }

    Enrollee::create($validatedData);

    Unit::where('uuid', $this->unit->uuid)->update([
        'is_enrolled' => 1,
        'rent' => $this->rent,
    ]);

    Point::create([
    'user_id' => auth()->user()->id,
    'point' => 5,
    'action_id' => 2,
    'property_uuid' => Session::get('property')
    ]);

    //  $details =[
    //  'property' => Session::get('property_name'),
    //  'tenant' => $this->tenant->tenant,
    //  'body' => 'Please be informed of the following details of your contract:',
    //  'start' => Carbon::parse($this->start)->format('M d, Y'),
    //  'end' => Carbon::parse($this->end)->format('M d, Y'),
    //  'rent' => $this->rent,
    //  'unit' => $this->unit->unit,
    //  ];

    //  Mail::to($this->owner->email)->send(new SendContractMailToOwner($details));

    DB::commit();


    return
    redirect('/unit/'.$this->unit->uuid)->with('success','Unit has been enrolled.');

    }catch (\Throwable $e) {
        ddd($e);
        DB::rollback();
        return back()->with('error','Cannot complete your action.');
        }   
    }

    public function render()
    {
    return view('livewire.enrollee-component');
    }
}
