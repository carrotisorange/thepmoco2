<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use App\Models\PropertyBuilding;
use Session;

class PropertyBuildingController extends Controller
{
   public function index($property_uuid){
        return PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
        ->when($property_uuid, function($query, $property_uuid){
           $query->where('property_buildings.property_uuid', $property_uuid);
        })
        ->get();
    }

    public function getBuildings(){
        return PropertyBuilding::where('property_uuid', Session::get('property_uuid'));
    }
}
