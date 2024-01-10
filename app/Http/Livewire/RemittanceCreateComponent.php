<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Session;
use DB;
use App\Models\Collection;

class RemittanceCreateComponent extends Component
{
    public $date;

    public function mount(){
        $this->date = Collection::where('property_uuid', Session::get('property_uuid'))
        ->posted()
        ->groupBy(DB::raw('date_format(created_at,"%m-%Y")'))
        ->orderBy(DB::raw('date_format(created_at,"%Y")'), 'desc')
        ->orderBy(DB::raw('date_format(created_at,"%m")'), 'desc')
        ->value('created_at');
    }

    protected function rules()
      {
        return [
            'date' => 'required|date'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeRemittance(){

        $this->validate();

        $collections = Collection::where('property_uuid', Session::get('property_uuid'))
        ->posted()
        ->whereMonth('created_at', Carbon::parse($this->date)->month)
        ->whereYear('created_at', Carbon::parse($this->date)->year)
        ->get();

        foreach($collections as $collection){
            if($collection->bill->particular_id == 1 || $collection->bill->particular_id == 2){
                app('App\Http\Controllers\Features\RemittanceController')->store($collection);
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
        $collectionsCount = Collection::where('collections.property_uuid', Session::get('property_uuid'))
        ->join('bills', 'collections.bill_id', 'bills.id')
        ->whereIn('bills.particular_id',[1,2])
        ->where('collections.is_posted',1)
        ->whereMonth('collections.created_at', Carbon::parse($this->date)->month)
        ->whereYear('collections.created_at', Carbon::parse($this->date)->year)
        ->count();

        $dates = Collection::where('property_uuid', Session::get('property_uuid'))
        ->posted()
        ->groupBy(DB::raw('date_format(created_at,"%m-%Y")'))
        ->orderBy(DB::raw('date_format(created_at,"%Y")'), 'desc')
        ->orderBy(DB::raw('date_format(created_at,"%m")'), 'desc')
        ->get();

        return view('livewire.remittance-create-component', compact('collectionsCount', 'dates'));
    }
}
