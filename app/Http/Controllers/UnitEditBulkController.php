<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class UnitEditBulkController extends Controller
{
    public function edit(Property $property, $batch_no)
    {
        return view('units.edit-bulk',[
            'batch_no' => $batch_no,
        ]);
    }
}
