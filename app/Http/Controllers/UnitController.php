<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens a',2);

        return view('units.show',[
            'unit' => $unit,
            'buildings' => app('App\Http\Controllers\PropertyBuildingController')->index(),
            'floors' => app('App\Http\Controllers\FloorController')->index(),
            'categories' => app('App\Http\Controllers\CategoryController')->index(),
            'statuses' => app('App\Http\Controllers\StatusController')->index(),
            'contracts' => app('App\Http\Controllers\ContractController')->show_unit_contracts($unit->uuid),
            'deed_of_sales' => app('App\Http\Controllers\DeedOfSaleController')->show_unit_deed_of_sales($unit->uuid),
            'bills' => app('App\Http\Controllers\BillController')->show_unit_bills($unit->uuid),
            'enrollees' => app('App\Http\Controllers\EnrolleeController')->show_unit_enrollees($unit->uuid)
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
