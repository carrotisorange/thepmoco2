<?php

namespace App\Http\Controllers;

use App\Models\PropertyRole;
use App\Models\Role;
use Illuminate\Http\Request;

class PropertyRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles =  PropertyRole::join('roles', 'property_roles.role_id', 'roles.id')
        ->where('property_uuid',Session('property'))
        ->get();
        
        return view('roles.index',[
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PropertyRole $propertyRole
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyRole $propertyRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PropertyRole $propertyRole
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyRole $propertyRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\PropertyRole $propertyRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyRole $propertyRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PropertyRole $propertyRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyRole $propertyRole)
    {
        //
    }
}
