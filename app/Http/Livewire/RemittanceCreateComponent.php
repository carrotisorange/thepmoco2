<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Session;
use DB;
use App\Models\Collection;

class RemittanceCreateComponent extends Component
{
    public $date;

    public function storeRemittance(){

        $this->validate([
            'date' => 'required|date'
        ]);

        $collections = Collection::where('property_uuid', Session::get('property_uuid'))
           ->posted()
           ->whereMonth('created_at', Carbon::parse($this->date)->month)
           ->get();

        foreach($collections as $collection){
             if($collection->bill->particular_id == 1 || $collection->bill->particular_id == 2){
                app('App\Http\Controllers\Features\RemittanceController')->store(
                    $collection->property_uuid,
                    $collection->unit->uuid,
                    $collection->ar_no,
                    $collection->bill->particular_id,
                    $collection->tenant_uuid,
                    $collection->guest_uuid,
                    $collection->created_at,
                    $collection->collection,
                    $collection->description
                );
            }
            continue;
        }

        return redirect('/property/'.Session::get('property_uuid').'/remittance')->with('success', 'Changes Saved!');

    }

    public function redirectToCollectionPage(){
        return redirect('/property/'.Session::get('property_uuid').'/collection/');
    }
    public function render()
    {

        return view('livewire.remittance-create-component',[
        'collectionsCount' => Collection::where('collections.property_uuid', Session::get('property_uuid'))
            ->join('bills', 'collections.bill_id', 'bills.id')
            ->whereNotNull('collections.tenant_uuid')
            ->where('particular_id',1)
            ->where('collections.is_posted',1)
            ->whereMonth('collections.created_at', Carbon::parse($this->date)->month)
            ->count(),

        'dates' => Collection::where('property_uuid', Session::get('property_uuid'))
            ->posted()
            ->groupBy(DB::raw('month(created_at)+"-"+year(created_at)'))
            ->get(),
        ]);
    }
}
