<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Property;
use App\Models\Floor;
use App\Models\Status;
use App\Models\Contract;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use DB;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::leftJoin('statuses', 'units.status_id', 'statuses.id')
        ->select('*', 'units.*')
        ->leftJoin('categories', 'units.category_id', 'categories.id')
        ->leftJoin('buildings', 'units.building_id', 'buildings.id')
        ->leftJoin('floors', 'units.floor_id', 'floors.id')
        ->where('status_id', '!=', 6)
        ->where('property_uuid', Session::get('property'))
        ->paginate(5);

        return view('admin.units.index',
            [
                'units' => $units,
            ]    
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($batch_no)
    {
        return view('admin.units.create',[
            'batch_no' => $batch_no
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $batch_no)
    {

        $request->validate([
            'number_of_units' => ['integer', 'required', 'min:1']
        ]);

       for($i=$request->number_of_units; $i>=1; $i--){
            Unit::create([
                'uuid' => Str::uuid(),
                'unit' => 'Unit '.$i,
                'property_uuid' => Session::get('property'),
                'user_id' => auth()->user()->id,
                'batch_no' => $batch_no
            ]);
       }

       $units = Unit::where('batch_no', $batch_no)->count();
        
        return redirect('units/'.$batch_no.'/edit')->with('success', $units.' units have been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        $contracts = Unit::findOrFail($unit->uuid)->contracts;

        return view('admin.units.show', [
            'unit' => $unit,
            'contracts' => $contracts,
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
        $units = Unit::join('categories', 'units.category_id','categories.id')
        ->leftJoin('statuses', 'units.status_id', 'statuses.id')
        ->leftJoin('buildings', 'units.building_id', 'buildings.id')
        ->leftJoin('floors', 'units.floor_id', 'floors.id')
        ->where('batch_no', $batch_no)
        ->get();

        $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
         ->where('property_buildings.property_uuid', Session::get('property'))
         ->get();

         $floors = Floor::all();

         $categories = Category::all();

        return view('admin.units.bulk-edit',[
            'units' => $units,
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'batch_no' => $batch_no
        ]);
    }

    public function edit(Unit $unit)
    {
        $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
        ->where('property_buildings.property_uuid', Session::get('property'))
        ->get();

        $floors = Floor::all();

        $categories = Category::all();

        return view('admin.units.edit',[
            'unit' => $unit,
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function bulk_update(Request $request, $batch_no)
    {
         $units = Unit::where('batch_no', $batch_no)->count();

        for($i = 1; $i<=$units; $i++){ 
            $unit=Unit::find(request('uuid'.$i));
            $unit->unit = request('unit'.$i);
            $unit->building_id = request('building_id'.$i);
            $unit->floor_id = request('floor_id'.$i);
            $unit->category_id = request('category_id'.$i);
            $unit->dimensions = request('dimensions'.$i);
            $unit->rent = request('rent'.$i);
            $unit->occupancy = request('occupancy'.$i);
            $unit->status_id = '1';
            $unit->save();
        }
        
        return redirect('/property/'.Session::get('property').'/units')->with('success', $units.' units have been
        updated.');
    }


    public function update(Request $request, Unit $unit)
    {
        $attributes = request()->validate([
        'unit' => ['required', 'string', 'max:255'],
        'building_id' => [Rule::exists('property_buildings', 'id')],
        'floor_id' => ['required', Rule::exists('floors', 'id')],
        'category_id' => ['required', Rule::exists('categories', 'id')],
        'thumbnail' => 'image',
        'dimensions' => 'required',
        'rent' => 'required',
        'occupancy' => 'required'
        ]);

        if(isset($attributes['thumbnail']))
        {
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $unit->update($attributes);

        return back()->with('success', 'Unit has been updated.');
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
