<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Utility extends Model
{
    use HasFactory, SoftDeletes;

    protected $attributes=[
        'status' => 'unbilled',
    ];

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function scopePosted($query){
        return $query->where('is_posted', 1);
    }

    public function scopeGetAll($query, $propertyUuid, $type, $isPosted){
       $results =
            $query->when($propertyUuid, function($query, $propertyUuid){
                $query->where('property_uuid', $propertyUuid);
            })
            ->when($type, function($query, $type){
                $query->where('type', $type);
            })
            ->when($isPosted, function($query, $isPosted){
              $query->where('is_posted', $isPosted);
            })->get();

        return $results;
    }
}
