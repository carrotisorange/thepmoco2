<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Timestamp;
use App\Models\Property;
use Carbon\Carbon;


class TimestampController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',12);

        return view('timestamps.index',[
            'timestamps' => Timestamp::where('property_uuid',Session::get('property'))
            ->orderBy('created_at', 'desc')
            ->paginate(10)
        ]);

      
    }
}
