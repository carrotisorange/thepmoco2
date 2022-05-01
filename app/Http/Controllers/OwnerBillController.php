<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerBillController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Owner $owner)
    {
        return view('owners.bills.index',[
            'owner' => Owner::find($owner->uuid),
            'bills' => Owner::find($owner->uuid)->bills
        ]);
    }
}
