<?php

namespace App\Http\Controllers;

use App\Models\UserProperty;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Role;

class UserPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_user_properties($property_uuid, $user_id)
    {
        return User::find($user_id)->user_properties()->get();
    }

    public function get_property_users($property_uuid)
    {
        return Property::find($property_uuid)->property_users()->get();
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
    public function store($property_uuid, $user_id, $is_account_owner, $is_approve)
    {
        UserProperty::create([
            'property_uuid' => $property_uuid,
            'user_id' => $user_id,
            'is_account_owner' => $is_account_owner,
            'is_approve' => $is_approve
        ]);
    }

    public function get_employee_positions()
    {
       return Role::orderBy('role')->whereIn('id', ['1', '2', '3', '4', '6', '11', '9'])->get();
    }

    public function get_user_statuses($property_uuid)
    {
       return UserProperty::join('users', 'user_id', 'users.id')
       ->where('property_uuid', $property_uuid)
       ->groupBy('users.status')
       ->get();
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProperty  $userProperty
     * @return \Illuminate\Http\Response
     */
    public function show(UserProperty $userProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProperty  $userProperty
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProperty $userProperty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProperty  $userProperty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProperty $userProperty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProperty  $userProperty
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProperty $userProperty)
    {
        //
    }

    public function remove_access(Property $property, UserProperty $userProperty)
    {
        return $userProperty;
    }
}
