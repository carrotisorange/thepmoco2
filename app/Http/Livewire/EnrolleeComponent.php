<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Enrollee;
use App\Models\Unit;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

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
    'rent' => 'required',
    'discount' => 'required',
    'contract' => 'required|mimes:pdf,doc,docx, image'
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
    $validatedData['contract'] = $this->contract->store('enrollees');

    Enrollee::create($validatedData);

    Unit::where('uuid', $this->unit->uuid)->update([
        'is_enrolled' => 1
    ]);

    DB::commit();

    return
    redirect('/unit/'.$this->unit->uuid)->with('success','Contract has been created.');

    } catch (\Throwable $e) {
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
