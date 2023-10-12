<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\House;
use Session;

class HouseController extends Controller
{
    public function index(Property $property,$batch_no=null){

        $featureId = 24;

        $restrictionId = 2;

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,$featureId,$restrictionId);

        app('App\Http\Controllers\PropertyController')->store_property_session($property->uuid);

        return view('houses.index',[
           'batch_no' => $batch_no
        ]);
    }

    public function edit(Property $property, $batch_no)
    {
        return view('houses.edit-bulk',[
            'property' => $property,
            'batch_no' => $batch_no,
        ]);
    }

    public function show(Property $property, House $house, $action=null)
    {
        $featureId = 2;
        $restrictionId = 2;

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,$featureId,$restrictionId);

        return view('houses.show',[
            'property' => $property,
            'house_details' => $house,
            // 'deed_of_sales' => app('App\Http\Controllers\DeedOfSaleController')->show_unit_deed_of_sales($house->id),
        ]);

    }
}
