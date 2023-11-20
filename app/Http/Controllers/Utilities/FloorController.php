<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Floor;

class FloorController extends Controller
{
    public function index($property_uuid)
    {
        return Floor::join('units', 'floors.id', 'units.floor_id')
          ->select('floor','floors.id as floor_id', DB::raw('count(*) as count'))
           ->when($property_uuid, function($query, $property_uuid){
           $query->where('units.property_uuid', $property_uuid);
          })
          ->where('floors.floor','!=','NA')
          ->groupBy('floors.id')
          ->get();
    }
}
