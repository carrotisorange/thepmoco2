<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;

use App\Models\{Ancillary,Property};
use Illuminate\Http\Request;

class AncillaryController extends Controller
{
    public function index(Property $property){
        // return view('layouts.under-construction-general');
        return view('features.ancillaries.index');
     }
}
