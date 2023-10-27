<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class BulletinController extends Controller
{
    public function index(Property $property){

        $featureId = 17;

        $restrictionId = 2;

        app('App\Http\Controllers\ActivityController')->store($property->uuid,auth()->user()->id,$restrictionId, $featureId);

        return view('bulletins.index');
    }
}
