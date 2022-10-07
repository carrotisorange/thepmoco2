<?php

namespace App\Http\Controllers;

use App\Models\Enrollee;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Owner;
use Illuminate\Support\Str;
use App\Models\Property;
use DB;

class EnrolleeController extends Controller
{
    public function index(Property $property, Owner $owner)
    {
        $enrollees = Owner::find($owner->uuid)->enrollees;

        return view('enrollees.index',[
            'enrollees' => $enrollees,
            'owner' => $owner
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property, Unit $unit, Owner $owner)
    {
        return view('enrollees.create', [
            'unit' => $unit,
            'owner' => $owner
        ]);
    }

    public function show_unit_enrollees($unit_uuid)
    {
        return Unit::findOrFail($unit_uuid)->enrollees()->paginate(5);
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
        'is_enrolled' => 1,
        'rent' => $request->rent,
        'discount' => $request->discount
        ]);

        DB::commit();

        return
        redirect('/unit/'.$unit->uuid)->with('success','Contract has been created.');

        } catch (\Throwable $e) {

            DB::rollback();

           session()->flash('error');
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
        $enrollee->update([
            'updated_at' => $request->updated_at,
            'unenrollment_reason' => $request->unenrollment_reason,
            'status' => 'pulled out'
        ]);

        Unit::find($enrollee->unit_uuid)
        ->update([
            'is_enrolled' => '2'
        ]);

        return back()->with('success', 'Unit is successfully pulled out from leasing');
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
