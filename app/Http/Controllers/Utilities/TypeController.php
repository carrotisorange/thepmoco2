<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Session;

class TypeController extends Controller
{
    public function index(){
        return Type::orderBy('type')->where('id','!=',8)->get();
    }

    public function getSteppers(){
        $steppers = Type::where('id', Session::get('property_type_id'))->pluck('stepper')->first();
        return explode(",", $steppers);
    }
}
