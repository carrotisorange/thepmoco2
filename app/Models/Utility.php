<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;

    protected $attributes=[
        'status' => 'unbilled',
    ];

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function scopeIsPosted($query){
        return $query->where('is_posted', 1);
    }
}
