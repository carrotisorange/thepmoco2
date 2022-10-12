<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\PropertyBuilding;
use App\Models\Status;
use App\Models\Floor;
use DB;
use App\Models\Category;
use App\Models\Owner;

use App\Models\Plan;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {   
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',2);

        Session::forget('tenant_uuid');

        Session::forget('owner_uuid');

        return view('units.index');
    }

    public function update_unit_occupancy_info(Property $property, Unit $unit, Owner $owner)
    {
        return view('occupancy.create',[
            'unit' => $unit,
            'owner' => $owner,
        ]);
    }

    public function quick_add(){
       session(['quick_add' => true]);

       return redirect('/property/'.Session::get('property').'/unit');
    }

    public function get_property_unit_statuses($property_uuid)
    {
        return Status::join('units', 'statuses.id', 'units.status_id')
        ->select('status','statuses.id as status_id', DB::raw('count(*) as count'))
        ->where('units.property_uuid', $property_uuid)
        ->where('statuses.status','!=','NA')
        ->groupBy('statuses.id')
        ->get();
    }

    public function get_property_unit_buildings($property_uuid)
    {
        return PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
        ->join('units', 'buildings.id', 'units.building_id')
        ->select('building','buildings.id as building_id', DB::raw('count(unit) as count'))
        ->distinct()
        ->where('property_buildings.property_uuid', $property_uuid)
        ->where('buildings.building','!=','NA')
        ->groupBy('buildings.id')
        ->get();
    }

    public function get_property_unit_floors($property_uuid)
    {
        return Floor::join('units', 'floors.id', 'units.floor_id')
        ->select('floor','floors.id as floor_id', DB::raw('count(*) as count'))
          ->where('units.property_uuid', $property_uuid)
           ->where('floors.floor','!=','NA')
           ->groupBy('floors.id')
          ->get();
    }

    public function get_property_unit_categories($property_uuid)
    {
        return Category::join('units', 'categories.id', 'units.category_id')
        ->select('category','categories.id as category_id', DB::raw('count(*) as count'))
        ->where('units.property_uuid', $property_uuid)
        ->where('categories.category','!=','NA')
        ->groupBy('categories.id')
        ->get();
    }

    public function get_property_unit_rents($property_uuid)
    {
        return Unit::where('units.property_uuid', $property_uuid)
        ->select('rent', DB::raw('count(*) as count'))
        ->where('rent','>',0)
        ->groupBy('rent')
        ->get();
    }
    
    public function get_property_unit_discounts($property_uuid)
    {
        return Unit::where('units.property_uuid', $property_uuid)
        ->select('discount', DB::raw('count(*) as count'))
        ->where('discount','>',0)
        ->groupBy('discount')
        ->get();
    }

       
    public function get_property_unit_sizes($property_uuid)
    { 
        return Unit::where('units.property_uuid', $property_uuid)
          ->whereNotNull('size')
         ->select('size', DB::raw('count(*) as count'))
          ->where('size','>',0)
          ->groupBy('size')
          ->get();
    }

    public function get_property_unit_occupancies($property_uuid)
    { 
        return Unit::where('units.property_uuid', $property_uuid)
        ->whereNotNull('occupancy')
        ->select('occupancy', DB::raw('count(*) as count'))
        ->where('occupancy','>',0)
        ->groupBy('occupancy')
        ->get();
    }

    public function get_property_unit_enrollment_statuses($property_uuid)
    { 
        return Unit::where('units.property_uuid', $property_uuid)
        ->select('is_enrolled', DB::raw('count(*) as count'))
        ->groupBy('is_enrolled')
        ->orderBy('is_enrolled', 'desc')
        ->get();
    }

    public function get_property_units($property_uuid, $status, $duration)
    {
        return Unit::where('property_uuid', $property_uuid)
         ->when($status, function ($query) use ($status) {
         $query->where('status_id', $status);
         })
          ->when($duration, function ($query) use ($duration) {
          $query->whereMonth('updated_at', $duration);
          });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($batch_no)
    {
        $this->authorize('manager');

        return view('units.create',[
            'batch_no' => $batch_no,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Property $property, Request $request, $batch_no)
    {   
        $plan_unit_limit =  Plan::find(auth()->user()->plan_id)->description;

        $total_unit_created = Property::find(Session::get('property'))->units()->count();

        if($plan_unit_limit <= $total_unit_created){
            return back()->with('error', 'Sorry. You have reached your plan unit limit');
        }

        $request->validate([
            'number_of_units' => ['integer', 'required', 'min:1', 'gt:0']
        ]);

       for($i=$request->number_of_units; $i>=1; $i--){
            Unit::create([
                'uuid' => Str::uuid(),
                'unit' => 'Unit '.$i,
                'building_id' => '1',
                'floor_id' => '1',
                'property_uuid' => Session::get('property'),
                'user_id' => auth()->user()->id,
                'batch_no' => $batch_no
            ]);
       }

       $units = Unit::where('batch_no', $batch_no)->count();

        app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, $request->number_of_units, 5);
        
        return redirect('/property/'.Session::get('property').'/unit/'.Str::random(8).'/edit')->with('success', $units.' unit is successully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property, Unit $unit)
    {
         Session::forget('tenant_uuid');

         Session::forget('owner_uuid');

         app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens one',2);

        return view('units.show',[
            'unit_details' => $unit,
            'contracts' => app('App\Http\Controllers\ContractController')->show_unit_contracts($unit->uuid),
            'deed_of_sales' => app('App\Http\Controllers\DeedOfSaleController')->show_unit_deed_of_sales($unit->uuid),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function bulk_edit($batch_no)
    {
        $this->authorize('admin');

        return view('units.bulk-edit',[
            'batch_no' => $batch_no,
        ]);
    }

    public function edit(Unit $unit)
    {
        
    }


    public function update(Request $request, Property $property, Unit $unit)
    {
        $attributes = request()->validate([
        'unit' => ['required', 'string', 'max:255'],
        'building_id' => [Rule::exists('property_buildings', 'id')],
        'floor_id' => ['required', Rule::exists('floors', 'id')],
         'status_id' => ['required', Rule::exists('statuses', 'id')],
        'category_id' => ['required', Rule::exists('categories', 'id')],
        'thumbnail' => 'image',
        'size' => 'required',
        'rent' => 'required',
         'discount' => 'required',
        'occupancy' => 'required'
        ]);

        if(isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $unit->update($attributes);

        return back()->with('success', 'Unit is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $unit = Unit::where('uuid', $uuid);
        $unit->delete();

        return back()->with('success', 'A unit has been removed.');
    }
}
