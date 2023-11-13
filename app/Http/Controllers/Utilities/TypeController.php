<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){
        return Type::orderBy('type')->where('id','!=',8)->get();
    }
}
