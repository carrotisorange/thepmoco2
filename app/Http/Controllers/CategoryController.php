<?php

namespace App\Http\Controllers;

use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    public function index($property_uuid)
    {
        return Category::all();
    }
}
