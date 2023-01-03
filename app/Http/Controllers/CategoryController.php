<?php

namespace App\Http\Controllers;

use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    public function index($property_uuid)
    {
        return Category::join('units', 'categories.id', 'units.category_id')
         ->select('category','categories.id as category_id', DB::raw('count(*) as count'))
         ->when($property_uuid, function($query, $property_uuid){
          $query->where('units.property_uuid', $property_uuid);
          })
         ->where('categories.category','!=','NA')
         ->groupBy('categories.id')
         ->get();
    }
}
