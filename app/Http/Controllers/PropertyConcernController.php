<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Concern;

class PropertyConcernController extends Controller
{
    public function index(Property $property)
    {
        $this->authorize('is_concern_read_allowed');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',13);

        return view('properties.concerns.index',[
            'property' => $property
        ]);
    }

    public function destroy($unit_uuid){

        $this->authorize('is_concern_delete_allowed');

        Concern::where('unit_uuid', $unit_uuid)->delete();
    }

}
