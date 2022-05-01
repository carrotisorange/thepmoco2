<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerDeedOfSalesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Owner $owner)
    {
        return view('owners.deed_of_sales.index',[
            'owner' => Owner::find($owner->uuid),
            'deed_of_sales' => Owner::find($owner->uuid)->deed_of_sales
        ]);
    }
}
