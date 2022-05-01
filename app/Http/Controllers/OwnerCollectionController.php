<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerCollectionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Owner $owner)
    {
        return view('owners.collections.index',[
            'owner' => Owner::find($owner->uuid),
            'collections' => Owner::find($owner->uuid)->collections
        ]);
    }
}
