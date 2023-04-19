<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Laravel\Scout\Searchable;

class Guest extends Model
{
    // use Searchable;

    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'uuid';
    
    protected $attributes = [
        'status' => 'reserved'
    ];

    // public function searchableAs()
    // {
    //     return 'guest';
    // }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }

    public function collections(){
        return $this->hasMany(Collection::class);
    }

    public function additional_guests(){
        return $this->hasMany(AdditionalGuest::class);
    }
}
