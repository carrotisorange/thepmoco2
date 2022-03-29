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
        ->where('property_uuid', Session::get('property'))
        ->where('status_id', '!=', 6)
        ->orderByRaw('LENGTH(unit)', 'ASC')
        ->paginate(5);

    //     $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
    //     ->select('building')
    //     ->distinct()
    //     ->where('property_buildings.property_uuid', Session::get('property'))
    //     ->get();

    //     $floors = Floor::join('units', 'floors.id', 'units.floor_id')
    //     ->select('floor')
    //     ->distinct()
    //     ->where('units.property_uuid', Session::get('property'))
    //     ->get();

    //     $categories = Category::join('units', 'categories.id', 'units.category_id')
    //     ->select('category')
    //     ->distinct()
    //     ->where('units.property_uuid', Session::get('property'))
    //     ->get();

    //     $rents = Unit::where('units.property_uuid', Session::get('property'))
    //     ->select('rent')
    //     ->distinct()
    //     ->get();

    //     $discounts = Unit::where('units.property_uuid', Session::get('property'))
    //      ->select('discount')
    //      ->distinct()
    //      ->get();

    //     $dimensions = Unit::where('units.property_uuid', Session::get('property'))
    //     ->whereNotNull('dimensions')
    //     ->select('dimensions')
    //     ->distinct()
    //     ->get();

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
        $this->authorize('manager');

        return view('admin.units.create',[
            'batch_no' => $batch_no,
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
            'number_of_units' => ['integer', 'required', 'min:1', 'gt:0']
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

        $enrollees = Unit::findOrFail($unit->uuid)->enrollees;

        $bills = Bill::join('tenants', 'bills.tenant_uuid', 'tenants.uuid')
          ->select('*', 'bills.status as bill_status')
          ->join('users', 'bills.user_id', 'users.id')
          ->join('particulars', 'bills.particular_id', 'particulars.id')
          ->join('units', 'bills.unit_uuid', 'units.uuid')
          ->where('bills.property_uuid', Session::get('property'))
          ->where('bills.unit_uuid', $unit->uuid)
          ->orderBy('bills.bill_no', 'asc')
          ->paginate(10);

        return view('admin.units.show', [
            'unit' => $unit,
            'contracts' => $contracts,
            'enrollees' => $enrollees,
            'bills' => $bills
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
        $this->authorize('manager');
        
        $units = Unit::leftJoin('categories', 'units.category_id','categories.id')
        ->leftJoin('statuses', 'units.status_id', 'statuses.id')
        ->leftJoin('buildings', 'units.building_id', 'buildings.id')
        ->leftJoin('floors', 'units.floor_id', 'floors.id')
        ->where('batch_no', $batch_no)
        ->orderByRaw('LENGTH(unit)', 'ASC')
        ->orderBy('units.unit')
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
            'batch_no' => $batch_no,
            'unit_count' => Unit::where('property_uuid', Session::get('property'))->where('units.status_id', '!=','6')->get()->count()+1,
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
            if(request('building_id'.$i))
            {
                $unit->building_id = request('building_id'.$i);
            }
            else
            {
                $unit->building_id = '1';
            }
           
            if(request('floor_id'.$i))
            {
                $unit->floor_id = request('floor_id'.$i);
            }
            else
            {
                $unit->floor_id = '1';
            }

            if(request('category_id'.$i))
            {
                $unit->category_id = request('category_id'.$i);
            }
             else
            {
                $unit->category_id = '1';
            }
            
            $unit->size = request('size'.$i);
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
