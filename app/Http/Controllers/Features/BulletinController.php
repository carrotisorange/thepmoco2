<?php

namespace App\Http\Controllers\Features;
use App\Http\Controllers\Controller;

use App\Models\Property;

class BulletinController extends Controller
{
    public function index(Property $property){
        return view('features.bulletins.index');
    }
}
