<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Utility;
use Session;
use Livewire\WithPagination;
use App\Models\Unit;
use Carbon\Carbon;
use Str;

class UtilityIndexComponent extends Component
{
    use WithPagination;

    public $search;

    public $property_uuid;

    public function mount()
    {
        $this->property_uuid = Session::get('property');
    }

    public function storeUtilities($option)
    {
        sleep(1);

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
        return view('livewire.utility-index-component',[
            'utilities' => Utility::isposted()
            ->select('*', 'units.unit as unit_name' )
            ->join('units', 'utilities.unit_uuid', 'units.uuid')
            ->where('utilities.property_uuid', $this->property_uuid)
             ->when(($this->search), function($query){
             $query->orderBy('id', 'asc');
             $query->where('units.unit','like', '%'.$this->search.'%');
             })
            
            ->orderBy('start_date', 'desc')
            ->orderByRaw('LENGTH(unit_name) ASC')->orderBy('unit_name', 'asc')
            ->paginate(10)
        ]);
    }
}
