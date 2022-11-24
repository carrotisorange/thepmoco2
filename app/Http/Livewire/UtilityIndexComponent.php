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
            'utilities' => Utility::where('property_uuid', Session::get('property'))
            ->isposted()
            ->paginate(10)
        ]);
    }
}
