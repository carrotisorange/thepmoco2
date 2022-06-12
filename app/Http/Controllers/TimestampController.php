<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Timestamp;
use Carbon\Carbon;


class TimestampController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($property_uuid, $date)
    {
        //Session::flash('success', 'Showing all timestamps on'.Carbon::parse($date)->format('M d, Y'));

        //session(['date' => $date]);
        
        return view('timestamps.index',[
            'timestamps' => Timestamp::where('property_uuid',Session::get('property'))
            ->orderBy('created_at', 'desc')
            ->paginate(10)
        ]);

      
    }
}
