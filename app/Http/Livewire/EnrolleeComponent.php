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

    public $start;
    public $end;
    public $rent;
    public $discount;
    public $contract;

    public function mount($unit, $owner)
    {
        $this->unit = $unit;
        $this->owner = $owner;
        $this->rent = $unit->rent;
        $this->discount = $unit->discount;
        $this->end = Carbon::now()->addYear()->format('Y-m-d');
        $this->start = Carbon::now()->format('Y-m-d');
        $this->term = Carbon::now()->addYear()->diffInMonths(Carbon::now()).' months';
    }

    public function hydrateTerm()
    {
        $this->term = Carbon::parse($this->end)->diffInMonths(Carbon::parse($this->start)).' months';
    }

    protected function rules()
    {
        return [
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'rent' => 'required',
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

        try {
            DB::beginTransaction();

            $validated_data = $this->validate();

            $this->store_enrollee($validated_data);

            $this->update_unit();

            app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, 5, 2);

            DB::commit();
        
            return
            redirect('property/'.Session::get('property').'/owner/'.$this->owner->uuid)->with('success','Success!');

        }catch (\Throwable $e) 
        {
            DB::rollback();
           session()->flash('error');
        }   
    }
    
    public function store_enrollee($validated_data)
    {
        $validated_data['uuid'] = Str::uuid();
        $validated_data['owner_uuid'] = $this->owner->uuid;
        $validated_data['unit_uuid'] = $this->unit->uuid;
        $validated_data['user_id'] = auth()->user()->id;
        $validated_data['property_uuid'] = Session::get('property');

        if($this->contract)
        {
            $validated_data['contract'] = $this->contract->store('owner_contracts');
        }else{
            $validated_data['contract'] = Property::find(Session::get('property'))->owner_contract;
        }

        Enrollee::create($validated_data);
    }

    public function update_unit()
    {
        Unit::where('uuid', $this->unit->uuid)->update([
            'is_enrolled' => 1,
            'rent' => $this->rent,
        ]);
    }

    public function render()
    {
        return view('livewire.enrollee-component');
    }
}
