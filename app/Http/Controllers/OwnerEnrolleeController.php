<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerEnrolleeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Owner $owner)
    {
        return view('owners.enrollees.index',[
            'owner' => Owner::find($owner->uuid),
            'enrollees' => Owner::find($owner->uuid)->enrollees
        ]);
    }
}
