<?php

namespace App\Http\Controllers;

use App\Models\Representative;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Property;
use App\Models\Owner;

class RepresentativeController extends Controller
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
    public function create(Property $property, Owner $owner)
    {
         return view('representatives.create',[
            'owner' => $owner,
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($representative, $email, $mobile_number, $relationship_id, $owner_uuid)
    {
        return Representative::create([
            'representative' => $representative,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'relationship_id' => $relationship_id,
            'owner_uuid' => $owner_uuid,
        ])->id;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function show(Representative $representative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function edit(Representative $representative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Representative $representative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guardian = Representative::where('id', $id);
        $guardian->delete();

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }
}
