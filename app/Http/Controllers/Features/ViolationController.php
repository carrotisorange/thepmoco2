<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use App\Models\{Property,Violation};

class ViolationController extends Controller
{
    public function index(Property $property){

        return view('features.violations.index');
    }

    public function show(Property $property, Violation $violation){
        $violation = Violation::find($violation->id);

        return view('features.violations.show',compact(
            'violation',
        ));
    }
}
