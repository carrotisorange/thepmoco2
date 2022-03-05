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
        ->paginate(10);

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

       for($i=1; $i<=$request->number_of_units; $i++){
            Unit::create([
                'uuid' => Str::uuid(),
                'unit' => 'Unit '.$i,
                'property_uuid' => Session::get('property'),
                'user_id' => auth()->user()->id,
                'batch_no' => $batch_no
            ]);
       }

       $units = Unit::where('batch_no', $batch_no)->count();
        
        return redirect('unit/'.$batch_no.'/edit')->with('success', $units.' units have been created.');
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
    public function edit($batch_no)
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

         $statuses = Status::all();

        return view('admin.units.edit',[
            'units' => $units,
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'statuses' => $statuses,
            'batch_no' => $batch_no
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $batch_no)
    {
        Unit::where('batch_no', $batch_no)
        ->update([
            'status_id' => 1
        ]);

        $units = Unit::where('batch_no', $batch_no)->count();
        
        return redirect('/property/'.Session::get('property').'/units')->with('success', $units.' units have been
        updated.');
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
