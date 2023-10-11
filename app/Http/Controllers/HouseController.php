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

        return view('houses.index',[
           'batch_no' => $batch_no
        ]);
    }
}
