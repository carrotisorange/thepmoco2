<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use App\Models\House;
use App\Models\Property;
use App\Models\Type;
use App\Models\Plan;
use Illuminate\Support\Str;

class HouseIndexComponent extends Component
{

    public $numberOfUnits = 1;

    public $search = '';
    public $occupancy = [];
    public $sortBy;
    public $orderBy;
    public $limitDisplayTo = 20;
    public $status_id;
    public $totalHousesCount;

    public function storeHouses(){

      if($this->numberOfUnits <= 0 || !$this->numberOfUnits){
        return redirect(url()->previous())->with('error', 'Cannot accept 0 or empty value.');
      }

      $batch_no = Str::random(8);

      $plan_unit_limit =  Plan::find(auth()->user()->plan_id)->description;

      $total_unit_created = Property::find(Session::get('property_uuid'))->houses()->count() + 1;

        // if($plan_unit_limit <= $total_unit_created){
        //     return back()->with('error', 'Sorry. You have reached your plan unit limit');
        // }

       for($i=$this->numberOfUnits; $i>=1; $i--){
            House::create([
                'house' => 'House '.$total_unit_created++,
                'property_uuid' => Session::get('property_uuid'),
                'batch_no' => $batch_no
            ]);
       }

        $houses = House::where('batch_no', $batch_no)->count();

        app('App\Http\Controllers\PointController')->store(Session::get('property_uuid'), auth()->user()->id, $this->numberOfUnits, 5);

        $propertyHouseOwnersCount = Property::find(Session::get('property_uuid'))->houseowners->count();

        if($propertyHouseOwnersCount == 0){
            return redirect('/property/'.Session::get('property_uuid').'/house-owner/')->with('success', 'Changes Saved!');
        }else{
            return redirect('/property/'.Session::get('property_uuid').'/house/')->with('success', 'Changes Saved!');
        }

    }

     public function get_houses()
    {
      return House::search($this->search)
      ->when(((!$this->sortBy) && (!$this->orderBy)), function($query){
        $query ->orderByRaw('LENGTH(house) ASC')->orderBy('house', 'asc');
      })
       ->when(($this->sortBy && $this->orderBy), function($query){
        // $query->orderBy($this->sortBy, $this->orderBy);
        $query->orderBy($this->sortBy, $this->orderBy);
       })

      ->where('property_uuid', Session::get('property_uuid'))
      ->when($this->status_id, function($query){
        $query->where('status_id',$this->status_id);
      })
      ->paginate($this->limitDisplayTo);
    }

    public function editHouses(){
        return redirect('/property/'.Session::get('property_uuid').'/house/all/edit');
    }

    public function render()
    {

        $stepper = Type::where('id', Session::get('property_type_id'))->pluck('stepper')->first();

        $steps = explode(",", $stepper);

        $houses =  $this->get_houses();

        $propertyHousesCount = Property::find(Session::get('property_uuid'))->houses->count();

        return view('livewire.house-index-component',[
            'houses' => $houses,
            'propertyHousesCount' => $propertyHousesCount,
            'steps' => $steps,
            'statuses' => app('App\Http\Controllers\StatusController')->house_index(Session::get('property_uuid')),
        ]);
    }
}
