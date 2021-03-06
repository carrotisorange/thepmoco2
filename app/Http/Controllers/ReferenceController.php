<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use App\Models\Unit;
use App\Models\Tenant;
use Session;
use App\Models\References;
use Illuminate\Validation\Rule;
use DB;
use App\Models\Property;

use Illuminate\Http\Request;

class ReferenceController extends Controller
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
         return view('references.create',[
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
    public function store(Request $request, Unit $unit, Tenant $tenant)
    {
           try{
           $attributes = request()->validate([
           'reference' => 'required',
           'email' => ['nullable', 'string', 'email', 'max:255', 'unique:references'],
           'mobile_number' => 'required',
           'relationship_id' => ['required', Rule::exists('relationships', 'id')],
           ]);

           $attributes['tenant_uuid'] = $tenant->uuid;

           DB::beginTransaction();

           Reference::create($attributes);

           DB::commit();

           return back()->with('success', 'Reference has been created.');

           }catch(\Exception $e)
           {
           DB::rollback();
           return back()->with('error','Cannot complete your action.');
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function show(Reference $reference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function edit(Reference $reference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reference $reference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reference = Reference::where('id', $id);
        $reference->delete();

        return back()->with('success', 'A reference has been removed.');
    }
}
