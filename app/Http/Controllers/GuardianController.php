<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Unit;
use App\Models\Tenant;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Unit $unit, Tenant $tenant)
    {
        return view('guardians.create',[
            'unit' => $unit,
            'tenant' => $tenant,
            'guardians' => Tenant::find($tenant->uuid)->guardians,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Unit $unit, Tenant $tenant)
    {
         $guardian_attributes = request()->validate([
         'guardian' => 'required',
         'email' => ['required', 'string', 'email', 'max:255', 'unique:guardians'],
         'mobile_number' => 'required',
         'relationship' => 'required',
         ]);

         $guardian_attributes['tenant_uuid'] = $tenant->uuid;

         Guardian::create($guardian_attributes);

        return back()->with('success', 'Guardian has been created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function show(Guardian $guardian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function edit(Guardian $guardian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guardian $guardian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guardian = Guardian::where('id', $id);
        $guardian->delete();

        return back()->with('success', 'A guardian has been removed.');
    }
}
