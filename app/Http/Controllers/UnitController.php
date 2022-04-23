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

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin.units.index');
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
                'building_id' => '1',
                'floor_id' => '1',
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
        $tenants = Unit::findOrFail($unit->uuid)->contracts;

        $deed_of_sales = Unit::findOrFail($unit->uuid)->deed_of_sales;

        $enrollees = Unit::findOrFail($unit->uuid)->enrollees;

        $bills = Unit::find($unit->uuid)->bills;

        // $bills = Bill::join('tenants', 'bills.tenant_uuid', 'tenants.uuid')
        //   ->select('*', 'bills.status as bill_status')
        //   ->join('users', 'bills.user_id', 'users.id')
        //   ->join('particulars', 'bills.particular_id', 'particulars.id')
        //   ->join('units', 'bills.unit_uuid', 'units.uuid')
        //   ->where('bills.property_uuid', Session::get('property'))
        //   ->where('bills.unit_uuid', $unit->uuid)
        //   ->orderBy('bills.bill_no', 'asc')
        //   ->paginate(10);

        return view('admin.units.show', [
            'unit' => $unit,
            'tenants' => $tenants,
            'deed_of_sales' => $deed_of_sales,
            'bills' => $bills,
            'enrollees' => $enrollees
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

        return view('admin.units.bulk-edit',[
            'batch_no' => $batch_no,
            'unit_count' => Unit::where('property_uuid', Session::get('property'))->where('units.status_id', '!=','6')->get()->count()+1,
        ]);
    }

    public function edit(Unit $unit)
    {
        $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
        ->where('property_buildings.property_uuid', Session::get('property'))
        ->get();

        return view('admin.units.edit',[
            'unit' => $unit,
            'buildings' => $buildings,
            'floors' => Floor::all(),
            'categories' => Category::all(),
            'statuses' => Status::all(),
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
        $units = Unit::where('status_id', 6)->count();

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
