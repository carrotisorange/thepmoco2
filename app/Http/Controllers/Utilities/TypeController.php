<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Session;
use DB;
use App\Models\{Type,UserProperty};

class TypeController extends Controller
{
    public function index(){
        return Type::orderBy('type')->where('id','!=',8)->get();
    }

    public function getSteppers(){
        $steppers = Type::where('id', Session::get('property_type_id')?Session::get('property_type_id'):2)->pluck('stepper')->first();
        return explode(",", $steppers);
    }

     public function getPropertyTypes(){
        return UserProperty::join('users', 'user_id', 'users.id')
        ->join('properties', 'property_uuid', 'properties.uuid')
        ->join('types', 'properties.type_id', 'types.id')
        ->select('*', DB::raw('count(*) as count'))
        // ->where('users.is_approved', 1)
        ->where('user_id', auth()->user()->id)
        ->where('properties.status', 'active')
        ->groupBy('type_id')
        ->get();
    }
}
