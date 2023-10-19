<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){
        return Type::orderBy('type')->where('id','!=',8)->get();
    }
}
