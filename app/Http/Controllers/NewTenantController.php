<?php

namespace App\Http\Controllers;
use App\Models\Unit;

use Illuminate\Http\Request;

class NewTenantController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Unit $unit)
    {
        $this->authorize('admin');
        
        return view('tenants.new.create', [
                    'unit' => $unit
        ]);
    }
}
