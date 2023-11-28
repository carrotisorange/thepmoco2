<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Session;
use App\Models\{PropertyParticular,Particular};

class PropertyParticularController extends Controller
{

    public function index()
    {
         return Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', Session::get('property_uuid'))
        ->get()->unique('particular');
    }

     public function store($property_uuid){

        $commonParticulars = Particular::where('is_common',1)->get();

        foreach ($commonParticulars as $item) {
            PropertyParticular::updateOrCreate(
            [   'property_uuid'=> Session::get('property_uuid'),
                'particular_id'=> $item->id,
                'minimum_charge' => 0.00,
                'due_date' => 28,
                'surcharge' => 1
            ]);
        }

     }
}
