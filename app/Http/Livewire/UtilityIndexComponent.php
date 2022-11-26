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

class UtilityIndexComponent extends Component
{
    use WithPagination;

    public $search;

    public function storeUtilities()
    {
        sleep(1);

        $units = Unit::where('property_uuid', Session::get('property'))->get();
        
        $batch_no = auth()->user()->id.Str::random(8);

        for ($i=0; $i < $units->count(); $i++) { 
            app('App\Http\Controllers\UtilityController')->store(
                $units->toArray()[$i]['property_uuid'], 
                $units->toArray()[$i]['uuid'], 
                auth()->user()->id,
                Carbon::now(),
                Carbon::now()->addMonth(),
                $batch_no
            );
        }

        return redirect('/property/'.Session::get('property').'/utilities/'.$batch_no);
    }

    public function render()
    {
        return view('livewire.utility-index-component',[
            'utilities' => Utility::isposted()
            ->select('*', 'units.unit as unit_name' )
            ->join('units', 'utilities.unit_uuid', 'units.uuid')
            ->where('utilities.property_uuid', Session::get('property'))
             ->when(($this->search), function($query){
             // $query->orderBy($this->sortBy, $this->orderBy);
             $query->where('units.unit','like', '%'.$this->search.'%');
             })
             ->orderByRaw('LENGTH(unit_name) ASC')->orderBy('unit_name', 'asc')
            ->paginate(10)
        ]);
    }
}
