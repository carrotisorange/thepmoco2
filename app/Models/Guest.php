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

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid')->withDefault();
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_uuid')->withDefault();
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

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function scopeGetAll($query, $propertyUuid, $status, $groupBy){
       $results = $query->when($propertyUuid, function($query, $propertyUuid){
                $query->where('property_uuid', $propertyUuid);
            })
            ->when($status, function($query, $status){
                $query->where('status', $status);
            })
            ->when($groupBy, function($query, $groupBy){
                $query->groupBy($groupBy);
            })->get();

        return $results;
    }
}
