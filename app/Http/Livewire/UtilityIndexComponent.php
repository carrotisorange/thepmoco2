<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Utility;
use Session;
use Livewire\WithPagination;
use App\Models\Unit;
use Carbon\Carbon;
use Str;
use DB;
use App\Models\Property;

class UtilityIndexComponent extends Component
{
    use WithPagination;

    public $search;

    public $property_uuid;

    public $status;

    public $type;

    public $date_created;

    public $limitDisplayTo;

    public $totalUtilitiesCount;

    public $totalUnitsCount;

    public $kwh;

    public $utility_type;

    public $filter_date;
    public $start_date;
    public $end_date;
    public $min_charge;

    public function mount()
    {
        $this->property_uuid = Session::get('property_uuid');
        $this->totalUtilitiesCount = Property::find(Session::get('property_uuid'))->utilities->count();
        $this->totalUnitsCount = Property::find($this->property_uuid)->units()->count();
        $this->filter_date = Carbon::parse(Property::find($this->property_uuid)->utilities()->orderBy('start_date', 'desc')->pluck('start_date')->first())->format('Y-m-d');
        $this->start_date = Carbon::now()->format('Y-m-d');
        $this->end_date = Carbon::now()->addMonth()->format('Y-m-d');
        $this->limitDisplayTo = 10;
    }

    public function clearFilters(){
        $this->search = null;
        $this->date_created = null;
        $this->type = null;
        $this->status = null;
        $this->limitDisplayTo = 10;
    }

    protected function rules()
    {
        return [
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'kwh' => 'required',
                'min_charge' => 'required',
                'utility_type' => 'required'
            ];
    }

    public function updated($propertyName)
      {
        $this->validateOnly($propertyName);
    }

    public function storeUtilities()
    {   
        $this->validate();

        set_time_limit(1000);

        $units = Unit::where('property_uuid', $this->property_uuid)->get();
        
        $batch_no = auth()->user()->id.Str::random(8);

        foreach($units as $unit){
            app('App\Http\Controllers\UtilityController')->store(
                $unit->property_uuid, 
                $unit->uuid, 
                $unit->previous_water_utility_reading,
                $unit->previous_electric_utility_reading,
                auth()->user()->id,
                $this->start_date,
                $this->end_date,
                $batch_no,
                $this->utility_type,
                $this->kwh,
                $this->min_charge,
            );    
        }
        
        return redirect('/property/'.$this->property_uuid.'/utilities/'.$batch_no.'/'.$this->utility_type);

    }

    public function render()
    {

          $statuses = Utility::where('property_uuid', $this->property_uuid)
          ->select('status')
          ->whereNotNull('status')
          ->posted()
          ->groupBy('status')
          ->get();

        $types = Utility::where('property_uuid', $this->property_uuid)
          ->select('type')
          ->whereNotNull('type')
             ->posted()
          ->groupBy('type')
          ->get();

          $dates = Utility::where('property_uuid', $this->property_uuid)
          ->select('start_date')
          ->whereNotNull('start_date')
          ->posted()
          ->groupBy('start_date')
          ->get();

          $utilities = Utility::posted()
          ->select('*', 'units.unit as unit_name' )
          ->join('units', 'utilities.unit_uuid', 'units.uuid')
          ->where('utilities.property_uuid', $this->property_uuid)
          ->when($this->status, function($query){
          $query->where('utilities.status',$this->status);
          })
          ->when($this->type, function($query){
          $query->where('utilities.type',$this->type);
          })

          ->when(($this->search), function($query){
          $query->where('units.unit','like', '%'.$this->search.'%');
          })

        ->when(($this->filter_date), function($query){
            $query->whereDate('utilities.start_date', $this->filter_date);
        })

          ->orderBy('start_date', 'desc')
          ->orderByRaw('LENGTH(unit_name) ASC')->orderBy('unit_name', 'asc')
          ->get();

        return view('livewire.utility-index-component',[
            'utilities' => $utilities,
            'statuses' => $statuses,
            'types' => $types,
            'dates' => $dates
        ]);
    }
}
