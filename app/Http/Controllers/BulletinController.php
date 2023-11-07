<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class BulletinController extends Controller
{
    public function index(Property $property){
        return view('features.bulletins.index');
    }
}
