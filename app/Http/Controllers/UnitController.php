<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Property;
use App\Models\Floor;
use App\Models\Status;
use App\Models\Contract;
use App\Models\Enrollee;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use DB;
use Illuminate\Validation\Rule;
use App\Models\Bill;
use App\Models\DeedOfSale;
use App\Models\Point;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        Session::forget('tenant_uuid');

        Session::forget('owner_uuid');

        return view('units.index');
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
        
        return back()->with('success', $units.' unit is successully created.');
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
         
        $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
        ->where('property_buildings.property_uuid', Session::get('property'))
        ->get();

        return view('units.show',[
            'unit' => $unit,
            'buildings' => $buildings,
            'floors' => Floor::all(),
            'categories' => Category::all(),
            'statuses' => Status::all(),
            'contracts' => Unit::findOrFail($unit->uuid)->contracts()->paginate(5),
            'deed_of_sales' => Unit::findOrFail($unit->uuid)->deed_of_sales()->paginate(5),
            'bills' => Unit::findOrFail($unit->uuid)->bills()->paginate(5),
            'enrollees' => Unit::findOrFail($unit->uuid)->enrollees()->paginate(5)
        ]);

        // return view('units.show', [
        //     'unit' => Unit::findOrFail($unit->uuid),
        //     'contracts' => Unit::findOrFail($unit->uuid)->contracts,
        //     'deed_of_sales' => Unit::findOrFail($unit->uuid)->deed_of_sales,
        //     'bills' => Unit::findOrFail($unit->uuid)->bills,
        //     'enrollees' => Unit::findOrFail($unit->uuid)->enrollees
        // ]);
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
        $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
        ->where('property_buildings.property_uuid', Session::get('property'))
        ->get();

        return view('units.edit',[
            
            'unit' => $unit,
            'buildings' => $buildings,
            'floors' => Floor::all(),
            'categories' => Category::all(),
            'statuses' => Status::all(),
             'contracts' => Unit::findOrFail($unit->uuid)->contracts()->paginate(5),
             'deed_of_sales' => Unit::findOrFail($unit->uuid)->deed_of_sales()->paginate(5),
             'bills' => Unit::findOrFail($unit->uuid)->bills()->paginate(5),
             'enrollees' => Unit::findOrFail($unit->uuid)->enrollees()->paginate(5)
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    // public function bulk_update(Request $request, Property $property, $batch_no)
    // {
    //     $units = Unit::where('status_id', 6)->count();

    //     for($i = 1; $i<=$units; $i++){ 
    //         $unit=Unit::find(request('uuid'.$i));
    //         $unit->unit = request('unit'.$i);
    //         if(request('building_id'.$i))
    //         {
    //             $unit->building_id = request('building_id'.$i);
    //         }
    //         else
    //         {
    //             $unit->building_id = '1';
    //         }
           
    //         if(request('floor_id'.$i))
    //         {
    //             $unit->floor_id = request('floor_id'.$i);
    //         }
    //         else
    //         {
    //             $unit->floor_id = '1';
    //         }

    //         if(request('category_id'.$i))
    //         {
    //             $unit->category_id = request('category_id'.$i);
    //         }
    //          else
    //         {
    //             $unit->category_id = '1';
    //         }
            
    //         $unit->size = request('size'.$i);
    //         $unit->rent = request('rent'.$i);
    //         $unit->occupancy = request('occupancy'.$i);
    //         $unit->status_id = '1';
    //         $unit->save();
    //     }

    //     app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, 5, $units);

    //     return redirect('/property/'.Session::get('property').'/units')->with('success', $units.' unit is successfully 
    //     created.');
    // }


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
