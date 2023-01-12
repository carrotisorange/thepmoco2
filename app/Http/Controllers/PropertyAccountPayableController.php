<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;

class PropertyAccountPayableController extends Controller
{
    public function index($property_uuid, $status=null)
    {
        app('App\Http\Controllers\ActivityController')->store($property_uuid, auth()->user()->id,'opens',17);

        return view('properties.accountpayables.index',[
            'accountpayables' => Property::find(Session::get('property'))->accountpayables()
               ->when($status, function ($query) use ($status) {
               $query->where('status', $status);
               })->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
