<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
   public function get_roles($property_uuid){
      return Role::orderBy('role')->endUser()->get();
   }
}
