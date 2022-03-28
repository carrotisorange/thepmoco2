<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;

class OldTenantController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Unit $unit)
    {
         return view('admin.tenants.old.create', [
            'unit' => $unit
         ]);
    }
}
