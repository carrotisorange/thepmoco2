<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Contract;

class PropertyContractController extends Controller
{
    public function index(Property $property){

        $this->authorize('is_contract_read_allowed');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',5);

        return view('properties.contracts.index',[
            'property' => $property
        ]);
    }

    public function destroy($unit_uuid){
        Contract::where('unit_uuid', $unit_uuid)->delete();
    }
}
