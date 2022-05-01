<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitContractController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Unit $unit)
    {
        return view('units.contracts.index',[
            'unit' => Unit::find($unit->uuid),
            'contracts' => Unit::find($unit->uuid)->contracts,
        ]);
    }
}
