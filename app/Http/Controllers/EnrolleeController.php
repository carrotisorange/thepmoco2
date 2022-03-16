<?php

namespace App\Http\Controllers;

use App\Models\Enrollee;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Owner;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Tenant;
use App\Models\Bill;
use App\Models\Property;
use App\Models\PropertyParticular;
use Session;
use DB;

class EnrolleeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $enrollees = Enrollee::leftJoin('units', 'enrollees.unit_uuid', 'units.uuid')
         ->leftJoin('owners', 'enrollees.owner_uuid', 'owners.uuid')
         ->leftJoin('buildings', 'units.building_id','buildings.id' )
         ->where('units.property_uuid', session('property'))
         ->groupBy('enrollees.uuid')
         ->paginate(10);

        return view('enrollees.index',[
            'enrollees' => $enrollees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unit $unit, Owner $owner)
    {
        return view('enrollees.create', [
        'unit' => $unit,
        'owner' => $owner
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Unit $unit, Owner $owner)
    {

         $enrollee_attributes = request()->validate([
         'start' => 'required|date',
         'end' => 'required|date|after:start',
         'rent' => 'required|integer',
         'discount' => 'required',
         'contract' => 'required|mimes:pdf,doc,docx,image'
         ]);

        try {
        DB::beginTransaction();

         $enrollee_uuid = Str::uuid();

        $enrollee_attributes['uuid'] = $enrollee_uuid;
        $enrollee_attributes['owner_uuid'] = $owner->uuid;
        $enrollee_attributes['unit_uuid'] = $unit->uuid;
        $enrollee_attributes['user_id'] = auth()->user()->id;
        $enrollee_attributes['contract'] = $request->file('contract')->store('enrollees');

        Enrollee::create($enrollee_attributes);

        Unit::where('uuid', $unit->uuid)->update([
        'is_enrolled' => 1
        ]);

        DB::commit();

        return
        redirect('/unit/'.$unit->uuid.'/owner/'.$owner->uuid.'/enrollee/'.$enrollee_uuid.'/bill/'.Str::random(8).'/create')->with('success','Contract has been created.');

        } catch (\Throwable $e) {
        ddd($e);
        DB::rollback();
        return back()->with('error','Cannot complete your action.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrollee  $enrollee
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollee $enrollee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Enrollee $enrollee
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollee $enrollee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Enrollee $enrollee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollee $enrollee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Enrollee $enrollee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollee $enrollee)
    {
        //
    }
}
