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

    public $start_date;

    public $limitDisplayTo = 10;

    public $totalUtilitiesCount;

    public function mount()
    {
        $this->property_uuid = Session::get('property');
        $this->totalUtilitiesCount = Property::find(Session::get('property'))->utilities->count();
    }

    public function storeUtilities($option)
    {   
        set_time_limit(1000);

        $units = Unit::where('property_uuid', $this->property_uuid)->get();
        
        $batch_no = auth()->user()->id.Str::random(8);

        for ($i=0; $i < $units->count(); $i++) { 
            //store utilities
            app('App\Http\Controllers\UtilityController')->store(
                $units->toArray()[$i]['property_uuid'], 
                $units->toArray()[$i]['uuid'], 
                $units->toArray()[$i]['previous_water_utility_reading'],
                $units->toArray()[$i]['previous_electric_utility_reading'],
                auth()->user()->id,
                Carbon::now(),
                Carbon::now()->addMonth(),
                $batch_no,
                $option
            );

        }
        
        return redirect('/property/'.$this->property_uuid.'/utilities/'.$batch_no.'/'.$option);

    }

    public function render()
    {

          $statuses = Utility::where('property_uuid', $this->property_uuid)
          ->select('status')
          ->whereNotNull('status')
          ->groupBy('status')
          ->get();

        $types = Utility::where('property_uuid', $this->property_uuid)
          ->select('type')
          ->whereNotNull('type')
          ->groupBy('type')
          ->get();

          $dates = Utility::where('property_uuid', $this->property_uuid)
          ->select('start_date')
          ->whereNotNull('start_date')
          ->groupBy('start_date')
          ->get();

          $utilities = Utility::isposted()
          ->select('*', 'units.unit as unit_name' )
          ->join('units', 'utilities.unit_uuid', 'units.uuid')
          ->where('utilities.property_uuid', $this->property_uuid)
          ->when($this->status, function($query){
          $query->where('status',$this->status);
          })
          ->when($this->type, function($query){
          $query->where('utilities.type',$this->type);
          })

          ->when(($this->search), function($query){
          $query->where('units.unit','like', '%'.$this->search.'%');
          })

        ->when(($this->start_date), function($query){
            $query->whereDate('utilities.start_date', $this->start_date);
        })

          ->orderBy('start_date', 'desc')
          ->orderByRaw('LENGTH(unit_name) ASC')->orderBy('unit_name', 'asc')
          ->paginate($this->limitDisplayTo);

        return view('livewire.utility-index-component',[
            'utilities' => $utilities,
            'statuses' => $statuses,
            'types' => $types,
            'dates' => $dates
        ]);
    }
}
