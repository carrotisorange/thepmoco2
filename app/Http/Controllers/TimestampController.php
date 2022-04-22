<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Timestamp;

class TimestampController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
            
        return view('timestamps.index',[
            'timestamps' => Timestamp::where('property_uuid',Session::get('property'))->get()
        ]);
    }
}
