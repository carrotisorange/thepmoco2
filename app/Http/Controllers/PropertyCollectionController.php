<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;

class PropertyCollectionController extends Controller
{
    public function index(Property $property)
    {
        $this->authorize('is_account_receivable_read_allowed');

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',11);
        
        $collections = Property::find(Session::get('property'))->acknowledgementreceipts;

        return view('properties.collections.index',[
           'collections'=> $collections,
        ]);
    }
}
