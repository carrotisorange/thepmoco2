<?php

namespace App\Http\Controllers;

use App\Models\UserProperty;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Role;

class UserPropertyController extends Controller
{
    public function get_user_properties($property_uuid, $user_id)
    {
        return User::find($user_id)->user_properties()->get();
    }

    public function get_property_users($property_uuid)
    {
        return Property::find($property_uuid)->property_users()->get();
    }

    public function isUserApproved($user_id, $property_uuid){
        $user = UserProperty::where('user_id', $user_id)
        ->where('property_uuid', $property_uuid)
        ->get('is_approved');

        if($user->toArray()[0]['is_approved'] == '0'){
           return abort(401);
        }
    }

    public function store($property_uuid, $user_id, $is_account_owner, $is_approved)
    {
        UserProperty::create([
            'property_uuid' => $property_uuid,
            'user_id' => $user_id,
            'is_account_owner' => $is_account_owner,
            'is_approved' => $is_approved
        ]);
    }

    public function get_personnel_positions()
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


    public function remove_access(Property $property, UserProperty $userProperty)
    {
        UserProperty::where('id', $userProperty->id)
        ->update([
            'is_approved' => 0,
        ]);

        return back()->with('success', 'Success!');
    }

    public function restore_access(Property $property, UserProperty $userProperty)
    {
        UserProperty::where('id', $userProperty->id)
        ->update([
            'is_approved' => 1,
        ]);

        return back()->with('success', 'Success!');
    }
}
