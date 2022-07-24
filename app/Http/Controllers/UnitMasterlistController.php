<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Session;

class UnitMasterlistController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $units = Property::find(Session::get('property'))
        ->contracts()
        ->where('status', '!=' ,'inactive')
        ->paginate(10);

        return view('units.masterlist.index', [
            'units' => $units
        ]);
    }
}
