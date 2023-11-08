<?php

namespace App\Http\Controllers;

use App\Models\PropertyParticular;
use App\Models\Particular;


class PropertyParticularController extends Controller
{

    public function index($property_uuid)
    {
         return Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', $property_uuid)
        ->get()->unique('particular');
    }

     public function store($property_uuid){
        for($i=1; $i<=8; $i++){
            PropertyParticular::updateOrCreate(
            [   'property_uuid'=> $property_uuid,
                'particular_id'=> $i,
                'minimum_charge' => 0.00,
                'due_date' => 28,
                'surcharge' => 1
            ]
        );
      }
     }
}
