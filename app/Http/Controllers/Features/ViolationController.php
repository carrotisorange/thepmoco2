<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use App\Models\Property;

class ViolationController extends Controller
{
    public function index(Property $property){
        return view('features.violations.index');
    }
}
