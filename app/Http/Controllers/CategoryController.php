<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($property_uuid)
    {
        return Category::all();
    }
}
