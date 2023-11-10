<?php

namespace App\Http\Controllers;

use App\Models\{Role,PropertyRole};

class RoleController extends Controller
{
   public function get_roles($property_uuid){
      return Role::orderBy('role')->endUser()->get();
   }

    public function index()
    {
        $roles =  PropertyRole::join('roles', 'property_roles.role_id', 'roles.id')
        ->where('property_uuid',Session('property'))
        ->get();

        return view('roles.index',[
            'roles' => $roles,
        ]);
    }

    public function get_property_user_roles($property_uuid)
    {
        return PropertyRole::where('property_uuid',$property_uuid)->get();
    }


    public function store($property_uuid)
    {
        for($i=1; $i<=9; $i++){
         PropertyRole::create([ 'property_uuid'=> $property_uuid,
            'role_id'=> $i,
            ]);
        }
    }
}
