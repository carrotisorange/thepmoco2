<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class UnitEditBulkController extends Controller
{
    public function edit(Property $property, $batch_no)
    {
        return view('units.edit-bulk',[
            'property' => $property, 
            'batch_no' => $batch_no,
        ]);
    }
}
