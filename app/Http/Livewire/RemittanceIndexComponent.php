<?php

namespace App\Http\Livewire;

use App\Models\DeedOfSale;
use Livewire\Component;
use App\Models\Remittance;
use Carbon\Carbon;
use App\Models\Collection;
use App\Models\Owner;
use App\Models\Bill;

class RemittanceIndexComponent extends Component
{
    public $property;

    public $created_at;
    public $date;

    public function mount(){
        $this->created_at = Carbon::parse(Remittance::where('property_uuid', $this->property->uuid)->orderBy('id', 'desc')->pluck('created_at')->first());
        $this->date = Carbon::now()->format('Y-m-d');
    }

    public function storeRemittance(){
        sleep(2);

        $this->validate([
            'date' => 'required|date'
        ]);

        $collections = Collection::where('property_uuid', $this->property->uuid)
           ->whereMonth('created_at', Carbon::parse($this->date)->month)
           ->get();

        foreach($collections as $collection){
             if($collection->bill->particular_id == 1){
                app('App\Http\Controllers\PropertyRemittanceController')->store(
                    $collection->property_uuid,
                    $collection->unit->uuid,
                    $collection->ar_no,
                    $collection->bill->particular_id,
                    $collection->tenant_uuid,
                    $this->date,
                    $collection->collection
                );
            }
            continue;
        }

        Remittance::where('owner_uuid', null)->delete();

        return redirect('/property/'.$this->property->uuid.'/remittance')->with('success', 'Success!');

    }

    public function redirectToOwnerPage(){
        return redirect('/property/'.$this->property->uuid.'/collection/');
    }

    public function render()
    {
        return view('livewire.remittance-index-component',[
            'remittances' => Remittance::where('property_uuid', $this->property->uuid)
            ->whereMonth('created_at', Carbon::parse($this->created_at)->month)
            ->get(),

            'dates' => Remittance::where('property_uuid', $this->property->uuid)
                ->groupBy('created_at')    
                ->get(),

            'collectionsCount' => Collection::where('property_uuid', $this->property->uuid)->whereMonth('created_at', Carbon::parse($this->date)->month)->count(),
            
        ]);
    }
}
