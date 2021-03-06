<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Unit;
use App\Models\Tenant;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Http\Request;
use App\Models\Property;

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
    public function create(Property $property, Tenant $tenant, Unit $unit)
    {
     
        return view('guardians.create',[
            'unit' => Unit::find($unit->uuid),
            'tenant' => $tenant,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tenant $tenant)
    {
         try{
            $attributes = request()->validate([
             'guardian' => 'required',
             'email' => ['nullable', 'string', 'email', 'max:255', 'unique:guardians'],
             'mobile_number' => 'required',
             'relationship_id' => ['required', Rule::exists('relationships', 'id')],
            ]);

            $attributes['tenant_uuid'] = $tenant->uuid;

            DB::beginTransaction();

            Guardian::create($attributes);

            DB::commit();

            return back()->with('success', 'Guardian has been created.');

         }catch(\Exception $e)
         {
            DB::rollback();
            return back()->with('error','Cannot complete your action.');
         }

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

        return back()->with('success', 'Guardian has been removed.');
    }
}
