<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Status;

class StatusController extends Controller
{
    public function index($property_uuid)
    {
        return Status::join('units', 'statuses.id', 'units.status_id')
        ->select('status','statuses.id as status_id', DB::raw('count(*) as count'))
        ->when($property_uuid, function($query, $property_uuid){
           $query->where('units.property_uuid', $property_uuid);
        })
        ->where('statuses.status','!=','NA')
        ->groupBy('statuses.id')
        ->get();
    }

    public function house_index($property_uuid)
    {
        return Status::join('houses', 'statuses.id', 'houses.status_id')
        ->select('status','statuses.id as status_id', DB::raw('count(*) as count'))
        ->when($property_uuid, function($query, $property_uuid){
           $query->where('houses.property_uuid', $property_uuid);
        })
        ->where('statuses.status','!=','NA')
        ->groupBy('statuses.id')
        ->get();
    }
}
