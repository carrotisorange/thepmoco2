<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyBuilding extends Model
{
    use HasFactory;

    public function scopeGetAll($query, $propertyUuid){
       $results = $query->when($propertyUuid, function($query, $propertyUuid){
                $query->where('property_uuid', $propertyUuid);
            })->get();

        return $results;
    }
}
