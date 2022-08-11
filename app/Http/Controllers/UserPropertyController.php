<?php

namespace App\Http\Controllers;

use App\Models\UserProperty;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;

class UserPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_user_properties($property_uuid, $user_id)
    {
        return User::find($user_id)->user_properties()->paginate(5);
    }

    public function show_property_users($property_uuid, $user_id)
    {
        return Property::find($property_uuid)->property_users()->paginate(5);
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
}
